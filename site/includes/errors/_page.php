<?php
global $nonce;
$home = function_exists('url') && defined('BASE') ? url('/') : '/';
$contact = function_exists('url') && defined('BASE') ? url('/contact') : '/contact';
?><!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<meta name="color-scheme" content="light">
<title><?= htmlspecialchars($err_title, ENT_QUOTES, 'UTF-8') ?> | Entersoftgroup</title>
<style nonce="<?= htmlspecialchars((string)$nonce, ENT_QUOTES, 'UTF-8') ?>">
<?php readfile(dirname(__DIR__, 2) . '/assets/css/main.css'); ?>
</style>
</head>
<body class="error-body">
<main id="main" class="error-page">
  <p class="error-code"><?= (int)$code ?></p>
  <h1><?= htmlspecialchars($err_title, ENT_QUOTES, 'UTF-8') ?></h1>
  <p><?= htmlspecialchars($err_text, ENT_QUOTES, 'UTF-8') ?></p>
  <p class="actions"><a class="btn btn-primary" href="<?= htmlspecialchars($home, ENT_QUOTES, 'UTF-8') ?>">Go to the homepage</a>
  <a class="btn btn-secondary" href="tel:+9647701558796">Call <span dir="ltr">0770 155 8796</span></a></p>
</main>
</body>
</html>
