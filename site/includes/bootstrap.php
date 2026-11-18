<?php
declare(strict_types=1);

define('ROOT', dirname(__DIR__));
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('error_log', ROOT . '/data/php-error.log');
ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');
date_default_timezone_set('Asia/Baghdad');
require ROOT . '/includes/functions.php';

defined('BASE') || define('BASE', rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/'));

header_remove('X-Powered-By');
ob_start();

$nonce = base64_encode(random_bytes(16));
$csp = "default-src 'self'; script-src 'nonce-$nonce' 'strict-dynamic'; style-src 'self' 'nonce-$nonce'; "
     . "img-src 'self' data:; font-src 'self'; connect-src 'self'; worker-src 'self'; manifest-src 'self'; "
     . "object-src 'none'; base-uri 'none'; form-action 'self'; frame-ancestors 'none'";
header("Content-Security-Policy: $csp; upgrade-insecure-requests");

function error_page(int $code, array $headers = []): never {
    global $nonce;
    while (ob_get_level()) ob_end_clean();
    if (!headers_sent()) {
        http_response_code($code);
        header('Content-Type: text/html; charset=UTF-8');
        header('Cache-Control: no-store');
        foreach ($headers as $h) header($h);
    }
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'HEAD') require ROOT . "/includes/errors/$code.php";
    exit;
}

set_exception_handler(function (Throwable $e): void {
    error_log((string)$e);
    error_page($e instanceof PDOException ? 503 : 500);
});
register_shutdown_function(function (): void {
    $e = error_get_last();
    if ($e && ($e['type'] & (E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR))) error_page(500);
});
set_error_handler(function (int $no, string $msg, string $file, int $line): bool {
    throw new ErrorException($msg, 0, $no, $file, $line);
});

define('ENV', load_env(ROOT . '/.env'));
if (ENV === 'local') header("Content-Security-Policy: $csp");

if (ENV !== 'local' && strcasecmp((string)($_SERVER['HTTP_HOST'] ?? ''), CANONICAL_HOST) !== 0) {
    header('Location: https://' . CANONICAL_HOST . ($_SERVER['REQUEST_URI'] ?? '/'), true, 301);
    exit;
}

if (is_file(ROOT . '/data/maintenance.flag') && !hash_equals(MAINT_KEY, (string)($_COOKIE['maint'] ?? ''))) {
    error_page(503, ['Retry-After: 900']);
}
