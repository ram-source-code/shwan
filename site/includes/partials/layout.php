<?php
/** @var array $meta  title, description, path, [h1 handled by page] */
/** @var array $site */
/** @var string $content */
/** @var string $nonce */
$nav = ['/' => 'Home', '/about' => 'About', '/team' => 'Team', '/contact' => 'Contact'];
$title = $meta['path'] === '/' ? $meta['title'] : $meta['title'] . ' | ' . SITE_NAME;
$tel = 'tel:' . $site['phone'];
$ld = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    '@id' => abs_url('/') . '#business',
    'name' => $site['name'],
    'url' => abs_url('/'),
    'logo' => abs_url('/assets/img/logo-600.png'),
    'image' => abs_url('/og-default.jpg'),
    'telephone' => $site['phone'],
    'email' => $site['email'],
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => $site['address']['building'] . ', ' . $site['address']['street'],
        'addressLocality' => $site['address']['city'],
        'addressRegion' => $site['address']['region'],
        'addressCountry' => 'IQ',
    ],
    'sameAs' => [$site['facebook']],
];
?><!doctype html>
<html lang="en" dir="ltr" data-base="<?= e(BASE) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title) ?></title>
<meta name="description" content="<?= e($meta['description']) ?>">
<link rel="canonical" href="<?= e(abs_url($meta['path'])) ?>">
<meta name="color-scheme" content="light">
<meta name="theme-color" content="#0c3f68">
<link rel="icon" href="<?= e(url('/favicon.ico')) ?>" sizes="48x48">
<link rel="icon" href="<?= e(url('/icon.svg')) ?>" type="image/svg+xml">
<link rel="apple-touch-icon" href="<?= e(url('/apple-touch-icon.png')) ?>">
<link rel="preload" href="<?= e(asset('assets/fonts/archivo.woff2')) ?>" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?= e(asset('assets/fonts/figtree.woff2')) ?>" as="font" type="font/woff2" crossorigin>
<?= og_tags($meta) ?>
<style nonce="<?= e($nonce) ?>">
@font-face{font-family:"Archivo";src:url("<?= e(asset('assets/fonts/archivo.woff2')) ?>") format("woff2");font-weight:100 900;font-display:swap}
@font-face{font-family:"Figtree";src:url("<?= e(asset('assets/fonts/figtree.woff2')) ?>") format("woff2");font-weight:300 900;font-display:swap}
<?php readfile(ROOT . '/assets/css/main.css'); ?>
</style>
<script type="application/ld+json" nonce="<?= e($nonce) ?>"><?= json_script($ld) ?></script>
<script src="<?= e(asset('assets/js/main.js')) ?>" nonce="<?= e($nonce) ?>" defer></script>
<script type="speculationrules" nonce="<?= e($nonce) ?>"><?= json_script(['prefetch' => [[
    'where' => ['and' => [
        ['href_matches' => BASE . '/*'],
        ['not' => ['href_matches' => '/*\\?*']],
        ['not' => ['selector_matches' => '.no-prefetch']],
        ['not' => ['selector_matches' => '[rel~=nofollow]']]]],
    'eagerness' => 'moderate']]]) ?></script>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header">
  <div class="header-inner wrap">
    <a class="site-logo" href="<?= e(url('/')) ?>"<?= $meta['path'] === '/' ? ' aria-current="page"' : '' ?>>
      <picture>
        <source type="image/avif" srcset="<?= e(asset('assets/img/logo-100.avif')) ?> 1x, <?= e(asset('assets/img/logo-200.avif')) ?> 2x">
        <img src="<?= e(asset('assets/img/logo-100.webp')) ?>" srcset="<?= e(asset('assets/img/logo-200.webp')) ?> 2x" width="100" height="74" alt="Entersoftgroup home">
      </picture>
    </a>
    <nav class="site-nav" aria-label="Primary">
      <button class="menu-button" type="button" popovertarget="site-menu" popovertargetaction="toggle" aria-controls="site-menu">
        <?= icon('menu') ?><span>Menu</span>
      </button>
      <ul id="site-menu" class="site-menu" popover="auto">
<?php foreach ($nav as $href => $label): ?>
        <li><a href="<?= e(url($href)) ?>"<?= $meta['path'] === $href ? ' aria-current="page"' : '' ?>><?= e($label) ?></a></li>
<?php endforeach; ?>
        <li class="menu-call"><a class="btn btn-primary btn-sm" href="<?= e($tel) ?>"><?= icon('phone') ?><span dir="ltr"><?= e(iraq_mobile_local($site['phone'])) ?></span></a></li>
      </ul>
    </nav>
  </div>
</header>
<main id="main" tabindex="-1">
<?= $content ?>
</main>
<footer class="site-footer">
  <div class="wrap footer-grid">
    <div class="footer-brand">
      <p class="footer-name"><?= e($site['name']) ?></p>
      <p><?= e($site['hero']['lead']) ?></p>
    </div>
    <div>
      <h2 class="footer-h">Visit us</h2>
      <address>
        <?= e($site['address']['building']) ?><br>
        <?= e($site['address']['street']) ?><br>
        <?= e($site['address']['city']) ?>, <?= e($site['address']['region']) ?>
      </address>
      <p><a href="<?= e($site['maps_url']) ?>" target="_blank" rel="noopener noreferrer">Open in Google Maps<span class="visually-hidden"> (opens in a new tab)</span></a></p>
    </div>
    <div>
      <h2 class="footer-h">Contact</h2>
      <ul class="footer-list">
        <li><a href="<?= e($tel) ?>"><?= icon('phone') ?><span dir="ltr"><?= e(iraq_mobile_local($site['phone'])) ?></span></a></li>
        <li><a href="https://wa.me/<?= e(substr($site['phone'], 1)) ?>" target="_blank" rel="noopener noreferrer"><?= icon('chat') ?>WhatsApp<span class="visually-hidden"> (opens in a new tab)</span></a></li>
        <li><a href="mailto:<?= e($site['email']) ?>"><?= icon('mail') ?><?= e($site['email']) ?></a></li>
        <li><a href="<?= e($site['facebook']) ?>" target="_blank" rel="noopener noreferrer"><?= icon('facebook') ?>Facebook<span class="visually-hidden"> (opens in a new tab)</span></a></li>
      </ul>
    </div>
    <nav aria-label="Footer">
      <h2 class="footer-h">Pages</h2>
      <ul class="footer-list">
<?php foreach ($nav as $href => $label): ?>
        <li><a href="<?= e(url($href)) ?>"><?= e($label) ?></a></li>
<?php endforeach; ?>
      </ul>
    </nav>
  </div>
  <div class="wrap footer-base">
    <p>© <?= date('Y') ?> <?= e($site['name']) ?></p>
  </div>
</footer>
</body>
</html>
