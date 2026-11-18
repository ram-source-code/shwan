<?php
declare(strict_types=1);

/** HTML / attribute encoding. */
function e(string $v): string {
    return htmlspecialchars($v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// Pass paths un-encoded and site-relative; append "#fragment" after the call.
function url(string $path = '/', array $query = []): string {
    $p = implode('/', array_map('rawurlencode', explode('/', trim($path, '/'))));
    return BASE . '/' . $p . ($query ? '?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986) : '');
}

/** Canonical absolute URL (canonical, OG, JSON-LD). */
function abs_url(string $path = '/', array $query = []): string {
    return (ENV === 'local' ? 'http://' : 'https://') . CANONICAL_HOST . url($path, $query);
}

/** Versioned URL of a public file under the site folder. */
function asset(string $p): string {
    $f = ROOT . '/' . ltrim($p, '/');
    return url($p) . '?v=' . (is_file($f) ? filemtime($f) : 0);
}

/** Inline SVG icon from the sprite (decorative unless $label is given). */
function icon(string $name, string $label = ''): string {
    $a11y = $label === '' ? 'aria-hidden="true"' : 'role="img" aria-label="' . e($label) . '"';
    return '<svg class="icon" ' . $a11y . ' width="24" height="24"><use href="'
        . e(asset('assets/img/icons.svg')) . '#' . e($name) . '"/></svg>';
}

/**
 * <picture> with AVIF + WebP for a generated set "assets/img/{name}-{w}.{ext}".
 * $widths: available widths; $w/$h: intrinsic size of the largest; $sizes: sizes attr.
 */
function picture(string $name, array $widths, int $w, int $h, string $alt, string $sizes, bool $lcp = false, string $class = ''): string {
    $set = fn(string $ext) => implode(', ', array_map(
        fn(int $x) => asset("assets/img/$name-$x.$ext") . " {$x}w", $widths));
    $largest = max($widths);
    $loading = $lcp ? 'fetchpriority="high"' : 'loading="lazy" decoding="async"';
    return '<picture' . ($class ? ' class="' . e($class) . '"' : '') . '>'
        . '<source type="image/avif" srcset="' . e($set('avif')) . '" sizes="' . e($sizes) . '">'
        . '<img src="' . e(asset("assets/img/$name-$largest.webp")) . '" srcset="' . e($set('webp')) . '" sizes="' . e($sizes) . '"'
        . ' width="' . $w . '" height="' . $h . '" alt="' . e($alt) . '" ' . $loading . '>'
        . '</picture>';
}

/** Stock/illustrative photo from the old site, labelled so it is never mistaken for the real team or office. */
function illus(string $name, array $widths, int $w, int $h, string $alt, string $sizes, string $class = ''): string {
    return '<figure class="illus' . ($class ? ' ' . e($class) : '') . '">' . picture($name, $widths, $w, $h, $alt, $sizes)
        . '<figcaption>Illustrative photo</figcaption></figure>';
}

/** +9647701234567 → 0770 123 4567 */
function iraq_mobile_local(string $e164): string {
    $n = '0' . substr($e164, 4);
    return substr($n, 0, 4) . ' ' . substr($n, 4, 3) . ' ' . substr($n, 7);
}

/** Matches the request against the route table; answers 404 / 405 itself. */
function route(array $routes, string $method, string $path): array {
    $allow = [];
    foreach ($routes as $def => $page) {
        [$methods, $pattern] = explode(' ', $def, 2);
        $re = '#^' . preg_replace('#\\\\\{(\w+)\\\\\}#', '(?<$1>[^/]+)', preg_quote($pattern, '#')) . '$#u';
        if (!preg_match($re, $path, $m)) continue;
        if (in_array($method, explode('|', $methods), true)) {
            return [$page, array_filter($m, 'is_string', ARRAY_FILTER_USE_KEY)];
        }
        $allow[] = str_replace('|', ', ', $methods);
    }
    if ($allow) {
        $allow = array_unique(array_merge(...array_map(fn($a) => explode(', ', $a), $allow)));
        if (in_array('GET', $allow, true)) $allow[] = 'HEAD';
        error_page(405, ['Allow: ' . implode(', ', $allow)]);
    }
    error_page(404);
}

/** Picks the .env section for this folder, defines one constant per key, returns the section name. */
function load_env(string $file): string {
    $ini = is_file($file) ? parse_ini_file($file, true, INI_SCANNER_RAW) : false;
    if (!$ini || !isset($ini['production'])) throw new RuntimeException('.env is missing, unreadable or has no [production]');
    $here = strtolower(str_replace('\\', '/', ROOT)) . '/';
    $name = 'production';
    foreach ($ini as $section => $keys) {
        if (!is_array($keys) || !isset($keys['when'])) continue;
        foreach (explode(',', strtolower($keys['when'])) as $glob) {
            if (fnmatch(trim($glob), $here)) { $name = $section; break 2; }
        }
    }
    foreach ($ini[$name] + array_filter($ini, 'is_string') as $key => $value) {
        if ($key === 'when') continue;
        if (!preg_match('/^[A-Z][A-Z0-9_]*$/', (string)$key) || defined($key) || str_contains((string)$value, '[CLIENT:')) {
            throw new RuntimeException(".env [$name] $key: bad or taken name, or still a placeholder");
        }
        define($key, (string)$value);
    }
    return $name;
}

/** OG + Twitter tags. $p: title, description, path, [og_type, og_image, og_alt]. */
function og_tags(array $p): string {
    $t = [
        'og:type' => $p['og_type'] ?? 'website',
        'og:site_name' => SITE_NAME,
        'og:title' => $p['title'],
        'og:description' => $p['description'],
        'og:url' => abs_url($p['path']),
        'og:image' => abs_url($p['og_image'] ?? '/og-default.jpg'),
        'og:image:type' => 'image/jpeg',
        'og:image:width' => 1200,
        'og:image:height' => 630,
        'og:image:alt' => $p['og_alt'] ?? 'Entersoftgroup logo',
        'og:locale' => 'en_US',
    ];
    $o = '';
    foreach ($t as $k => $v) $o .= '<meta property="' . $k . '" content="' . e((string)$v) . "\">\n";
    $tw = ['twitter:card' => 'summary_large_image', 'twitter:title' => $t['og:title'], 'twitter:description' => $t['og:description'],
           'twitter:image' => $t['og:image'], 'twitter:image:alt' => $t['og:image:alt']];
    foreach ($tw as $k => $v) $o .= '<meta name="' . $k . '" content="' . e((string)$v) . "\">\n";
    return $o;   // no twitter:site: Entersoftgroup has no X account
}

/** JSON for a <script> block (safe against </script> injection). */
function json_script(array $data): string {
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}
