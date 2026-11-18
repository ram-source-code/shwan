<?php
declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
if (getenv('REDIRECT_FORBIDDEN') || getenv('FORBIDDEN')) error_page(403);

$method = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'HEAD' ? 'GET' : ($_SERVER['REQUEST_METHOD'] ?? 'GET');
$raw = rawurldecode((string)strtok($_SERVER['REQUEST_URI'] ?? '/', '?'));
if (!mb_check_encoding($raw, 'UTF-8') || str_contains($raw, "\0")) error_page(404);
if (BASE !== '' && str_starts_with($raw, BASE)) $raw = substr($raw, strlen(BASE));
$clean = '/' . trim((string)preg_replace('#/+#', '/', $raw), '/');
$path  = $clean;

$old = require ROOT . '/includes/redirects.php';
if (array_key_exists(strtolower($path), $old)) {
    $to = $old[strtolower($path)];
    if ($to === null) error_page(410);
    header('Location: ' . url($to), true, 301);
    exit;
}

[$page, $params] = route(require ROOT . '/includes/routes.php', $method, $path);
if ($raw !== $clean && $method === 'GET') {
    header('Location: ' . url($clean, $_GET), true, 301);
    exit;
}

$site = require ROOT . '/includes/content.php';
ob_start();
$meta = require ROOT . "/includes/pages/$page.php";
$content = ob_get_clean();
if (is_array($meta)) {
    header('Content-Type: text/html; charset=UTF-8');
    header('Cache-Control: no-cache');
    require ROOT . '/includes/partials/layout.php';
} else {
    echo $content;
}
