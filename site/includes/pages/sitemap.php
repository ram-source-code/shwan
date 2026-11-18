<?php
header('Content-Type: application/xml; charset=UTF-8');
header('Cache-Control: public, max-age=0, must-revalidate');
$pages = ['/' => 'home', '/about' => 'about', '/team' => 'team', '/contact' => 'contact'];
$content = filemtime(ROOT . '/includes/content.php');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($pages as $path => $file) {
    $t = max($content, filemtime(ROOT . "/includes/pages/$file.php"));
    echo '  <url><loc>' . e(abs_url($path)) . '</loc><lastmod>' . date('c', $t) . "</lastmod></url>\n";
}
echo "</urlset>\n";
return null;
