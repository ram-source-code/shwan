<?php
// The only PHP file the web can reach.
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
if (getenv('REDIRECT_FORBIDDEN') || getenv('FORBIDDEN')) error_page(403);   // set by .htaccess for blocked paths

$method = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'HEAD' ? 'GET' : ($_SERVER['REQUEST_METHOD'] ?? 'GET');
$raw = rawurldecode((string)strtok($_SERVER['REQUEST_URI'] ?? '/', '?'));   // not parse_url(): it reads "//x/y" as host + path
if (!mb_check_encoding($raw, 'UTF-8') || str_contains($raw, "\0")) error_page(404);
if (BASE !== '' && str_starts_with($raw, BASE)) $raw = substr($raw, strlen(BASE));
$clean = '/' . trim((string)preg_replace('#/+#', '/', $raw), '/');           // "/", "/about"
$path  = $clean;

// Old .html URLs from the previous site: one 301, or 410 for removed demo pages.
$old = require ROOT . '/includes/redirects.php';
if (array_key_exists(strtolower($path), $old)) {
    $to = $old[strtolower($path)];
    if ($to === null) error_page(410);
    header('Location: ' . url($to), true, 301);
    exit;
}

[$page, $params] = route(require ROOT . '/includes/routes.php', $method, $path);
if ($raw !== $clean && $method === 'GET') {                                    // one slash style, real pages only
    header('Location: ' . url($clean, $_GET), true, 301);
    exit;
}

$site = require ROOT . '/includes/content.php';
ob_start();
$meta = require ROOT . "/includes/pages/$page.php";                           // echoes its <main> content, returns meta
$content = ob_get_clean();
header('Content-Type: text/html; charset=UTF-8');
header('Cache-Control: no-cache');
if (is_array($meta)) require ROOT . '/includes/partials/layout.php';
else echo $content;
