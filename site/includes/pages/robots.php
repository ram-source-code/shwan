<?php
// robots.txt: public rules only; the Sitemap line follows CANONICAL_HOST and BASE.
header('Content-Type: text/plain; charset=UTF-8');
header('Cache-Control: public, max-age=0, must-revalidate');
echo "User-agent: *\nAllow: /\n\nSitemap: " . abs_url('/sitemap.xml') . "\n";
return null;
