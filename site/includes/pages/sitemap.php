<?php
header('Content-Type: application/xml; charset=UTF-8');
header('Cache-Control: public, max-age=0, must-revalidate');
$pages = ['/' => 'home', '/about' => 'about', '/team' => 'team', '/contact' => 'contact'];
$base = max(filemtime(ROOT . '/includes/content.php'), ...array_map(fn($c) => filemtime(ROOT . "/includes/lang/$c.php"), array_keys(LANGS)));
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";
foreach ($pages as $path => $file) {
    $t = date('c', max($base, filemtime(ROOT . "/includes/pages/$file.php")));
    foreach (array_keys(LANGS) as $code) {
        echo '  <url><loc>' . e(labs($path, $code)) . '</loc><lastmod>' . $t . "</lastmod>\n";
        foreach (array_keys(LANGS) as $alt) echo '    <xhtml:link rel="alternate" hreflang="' . $alt . '" href="' . e(labs($path, $alt)) . "\"/>\n";
        echo '    <xhtml:link rel="alternate" hreflang="x-default" href="' . e(labs($path, 'ckb')) . "\"/>\n  </url>\n";
    }
}
echo "</urlset>\n";
return null;
