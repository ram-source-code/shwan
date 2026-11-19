<?php
global $nonce;
$home = function_exists('url') && defined('BASE') ? url('/') : '/';
$h = fn(string $s) => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
$lead = $msgs['ckb'];
?><!doctype html>
<html lang="ckb" dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<meta name="color-scheme" content="light dark">
<title><?= $h($lead[0]) ?> · <?= $h($msgs['en'][0]) ?> | Entersoftgroup</title>
<style nonce="<?= $h((string)$nonce) ?>">
<?= str_replace('../img/', (defined('BASE') ? BASE : '') . '/assets/img/', (string)file_get_contents(dirname(__DIR__, 2) . '/assets/css/main.css')) ?>
</style>
</head>
<body class="error-body">
<main id="main" class="error-page">
  <p class="error-code"><?= (int)$code ?></p>
<?php foreach (['ckb' => 'rtl', 'en' => 'ltr', 'ar' => 'rtl'] as $l => $d): ?>
  <div class="error-msg" lang="<?= $l ?>" dir="<?= $d ?>">
    <?= $l === 'ckb' ? '<h1>' : '<p class="error-title">' ?><?= $h($msgs[$l][0]) ?><?= $l === 'ckb' ? '</h1>' : '</p>' ?>
    <p><?= $h($msgs[$l][1]) ?></p>
  </div>
<?php endforeach; ?>
  <p class="actions"><a class="btn btn-primary" href="<?= $h($home) ?>">سەرەکی · Home · الرئيسية</a>
  <a class="btn btn-secondary" href="tel:+9647701558796"><span dir="ltr">0770 155 8796</span></a></p>
</main>
</body>
</html>
