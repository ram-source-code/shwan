<?php
$title = $meta['path'] === '/' ? $meta['title'] : $meta['title'] . ' | ' . SITE_NAME;
$tel = 'tel:' . $site['phone'];
$wa = 'https://wa.me/' . substr($site['phone'], 1);
$langs = ['ckb' => require ROOT . '/includes/lang/ckb.php', 'en' => require ROOT . '/includes/lang/en.php', 'ar' => require ROOT . '/includes/lang/ar.php'];
$hreflang = ['ckb' => 'ckb', 'en' => 'en', 'ar' => 'ar'];
$alternates = array_values(array_map(fn($l) => $l['locale'], array_diff_key($langs, [LANG => 1])));
$addr = t('address');
$comma = LANG === 'en' ? ', ' : '، ';
$biz = [
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
        'streetAddress' => $addr[0] . $comma . $addr[1],
        'addressLocality' => $addr[2],
        'addressRegion' => $addr[3],
        'addressCountry' => 'IQ',
    ],
    'sameAs' => [$site['facebook']],
];
$ld = ['@context' => 'https://schema.org', '@graph' => [
    ['@type' => 'WebSite', '@id' => abs_url('/') . '#website', 'name' => SITE_NAME, 'url' => abs_url('/'),
     'inLanguage' => ['ckb', 'en', 'ar'], 'publisher' => ['@id' => abs_url('/') . '#business']],
    ['@type' => 'WebPage', '@id' => labs($meta['path']) . '#webpage', 'url' => labs($meta['path']), 'name' => $title,
     'description' => $meta['description'], 'inLanguage' => LANG, 'isPartOf' => ['@id' => abs_url('/') . '#website'],
     'about' => ['@id' => abs_url('/') . '#business'], 'primaryImageOfPage' => abs_url('/og-default.jpg')],
    $biz,
]];
$og = array_merge($meta, ['locale' => t('locale'), 'alternates' => $alternates, 'og_alt' => t('og_alt'), 'path' => LANGS[LANG] . ($meta['path'] === '/' ? '' : $meta['path'])]);
if ($og['path'] === '') $og['path'] = '/';
?><!doctype html>
<html lang="<?= e(LANG) ?>" dir="<?= e(t('dir')) ?>" data-base="<?= e(BASE) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="text-scale" content="scale">
<title><?= e($title) ?></title>
<script nonce="<?= e($nonce) ?>">try{var t=localStorage.getItem('esg-theme');if(t==='light'||t==='dark')document.documentElement.dataset.theme=t}catch(e){}</script>
<meta name="description" content="<?= e($meta['description']) ?>">
<link rel="canonical" href="<?= e(labs($meta['path'])) ?>">
<?php foreach ($hreflang as $code => $tag): ?>
<link rel="alternate" hreflang="<?= e($tag) ?>" href="<?= e(labs($meta['path'], $code)) ?>">
<?php endforeach; ?>
<link rel="alternate" hreflang="x-default" href="<?= e(labs($meta['path'], 'ckb')) ?>">
<meta name="color-scheme" content="light dark">
<meta name="theme-color" content="#0c3f68">
<link rel="icon" href="<?= e(url('/favicon.ico')) ?>" sizes="any">
<link rel="icon" href="<?= e(url('/favicon-32x32.png')) ?>" type="image/png" sizes="32x32">
<link rel="icon" href="<?= e(url('/icon.svg')) ?>" type="image/svg+xml">
<link rel="apple-touch-icon" href="<?= e(url('/apple-touch-icon.png')) ?>" sizes="180x180">
<link rel="manifest" href="<?= e(url('/manifest.webmanifest')) ?>">
<?php if (LANG === 'en'): ?>
<link rel="preload" href="<?= e(asset('assets/fonts/archivo.woff2')) ?>" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?= e(asset('assets/fonts/figtree.woff2')) ?>" as="font" type="font/woff2" crossorigin>
<?php else: ?>
<link rel="preload" href="<?= e(asset('assets/fonts/noto-kufi-arabic.woff2')) ?>" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?= e(asset('assets/fonts/vazirmatn.woff2')) ?>" as="font" type="font/woff2" crossorigin>
<?php endif; ?>
<?= og_tags($og) ?>
<style nonce="<?= e($nonce) ?>">
@font-face{font-family:"Archivo";src:url("<?= e(asset('assets/fonts/archivo.woff2')) ?>") format("woff2");font-weight:100 900;font-display:swap}
@font-face{font-family:"Figtree";src:url("<?= e(asset('assets/fonts/figtree.woff2')) ?>") format("woff2");font-weight:300 900;font-display:swap}
@font-face{font-family:"Noto Kufi Arabic";src:url("<?= e(asset('assets/fonts/noto-kufi-arabic.woff2')) ?>") format("woff2");font-weight:100 900;font-display:swap;unicode-range:U+0600-06FF,U+0750-077F,U+08A0-08FF,U+200C-200F,U+FB50-FDFF,U+FE70-FEFF}
@font-face{font-family:"Vazirmatn";src:url("<?= e(asset('assets/fonts/vazirmatn.woff2')) ?>") format("woff2");font-weight:100 900;font-display:swap;unicode-range:U+0600-06FF,U+0750-077F,U+08A0-08FF,U+200C-200F,U+FB50-FDFF,U+FE70-FEFF}
<?= str_replace('../img/', BASE . '/assets/img/', (string)file_get_contents(ROOT . '/assets/css/main.css')) ?>
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
<!--email_off-->
<a class="skip-link" href="#main"><?= e(t('skip')) ?></a>
<header class="site-header">
  <div class="edition">
    <div class="wrap edition-inner">
      <div class="edition-tools">
        <nav class="lang-switch" aria-label="<?= e(t('language')) ?>">
<?php foreach ($langs as $code => $l): ?>
          <a href="<?= e(lurl($meta['path'], $code)) ?>" lang="<?= e($code) ?>" hreflang="<?= e($code) ?>"<?= $code === LANG ? ' aria-current="true"' : '' ?>><?= e($l['name']) ?></a>
<?php endforeach; ?>
        </nav>
        <div class="theme-switch" role="group" aria-label="<?= e(t('theme')) ?>" hidden>
          <button type="button" data-theme-set="light" aria-pressed="false"><?= icon('sun') ?><span class="visually-hidden"><?= e(t('theme_light')) ?></span></button>
          <button type="button" data-theme-set="dark" aria-pressed="false"><?= icon('moon') ?><span class="visually-hidden"><?= e(t('theme_dark')) ?></span></button>
        </div>
      </div>
    </div>
  </div>
  <div class="header-inner wrap">
    <a class="site-logo" href="<?= e(lurl('/')) ?>"<?= $meta['path'] === '/' ? ' aria-current="page"' : '' ?>>
      <picture class="logo-light">
        <source type="image/avif" srcset="<?= e(asset('assets/img/logo-100.avif')) ?> 1x, <?= e(asset('assets/img/logo-200.avif')) ?> 2x">
        <img src="<?= e(asset('assets/img/logo-100.webp')) ?>" srcset="<?= e(asset('assets/img/logo-200.webp')) ?> 2x" width="100" height="74" alt="<?= e(t('home_link')) ?>">
      </picture>
      <picture class="logo-dark">
        <source type="image/avif" srcset="<?= e(asset('assets/img/logo-dark-100.avif')) ?> 1x, <?= e(asset('assets/img/logo-dark-200.avif')) ?> 2x">
        <img src="<?= e(asset('assets/img/logo-dark-100.webp')) ?>" srcset="<?= e(asset('assets/img/logo-dark-200.webp')) ?> 2x" width="100" height="74" alt="<?= e(t('home_link')) ?>">
      </picture>
    </a>
    <p class="nav-tagline" aria-hidden="true"><?= e(t('tagline')) ?></p>
    <nav class="site-nav" aria-label="<?= e(t('menu')) ?>">
      <button class="menu-button" type="button" popovertarget="site-menu" popovertargetaction="toggle" aria-controls="site-menu">
        <?= icon('menu') ?><span><?= e(t('menu')) ?></span>
      </button>
      <ul id="site-menu" class="site-menu" popover="auto">
<?php foreach (t('nav') as $href => $label): ?>
        <li><a href="<?= e(lurl($href)) ?>"<?= $meta['path'] === $href ? ' aria-current="page"' : '' ?>><?= e($label) ?></a></li>
<?php endforeach; ?>
        <li class="menu-call"><a class="btn btn-primary btn-sm" href="<?= e($tel) ?>"><?= icon('phone') ?><span class="visually-hidden"><?= e(t('call')) ?> </span><bdo dir="ltr"><?= e(phone_local($site['phone'])) ?></bdo></a></li>
      </ul>
    </nav>
  </div>
</header>
<main id="main" tabindex="-1">
<?= $content ?>
</main>
<footer class="site-footer">
  <div class="ornament" aria-hidden="true"></div>
  <div class="wrap footer-grid">
    <div class="footer-brand">
      <picture class="footer-badge">
        <source type="image/avif" srcset="<?= e(asset('assets/img/logo-badge-96.avif')) ?> 1x, <?= e(asset('assets/img/logo-badge-192.avif')) ?> 2x">
        <img src="<?= e(asset('assets/img/logo-badge-96.webp')) ?>" srcset="<?= e(asset('assets/img/logo-badge-192.webp')) ?> 2x" width="96" height="96" alt="" loading="lazy" decoding="async">
      </picture>
      <p class="footer-name" translate="no"><?= e($site['name']) ?></p>
      <p><?= tx(t('lead')) ?></p>
    </div>
    <div>
      <h2 class="footer-h"><?= e(t('visit_us')) ?></h2>
      <address><?= e($addr[0]) ?><br><?= e($addr[1]) ?><br><?= e($addr[2]) ?><?= e($comma) ?><?= e($addr[3]) ?></address>
      <p><a href="<?= e($site['maps_url']) ?>" target="_blank" rel="noopener noreferrer"><?= e(t('maps')) ?><span class="visually-hidden"> <?= e(t('new_tab')) ?></span></a></p>
    </div>
    <div>
      <h2 class="footer-h"><?= e(t('contact')) ?></h2>
      <ul class="footer-list">
        <li><a href="<?= e($tel) ?>"><?= icon('phone') ?><span class="visually-hidden"><?= e(t('call')) ?> </span><bdo dir="ltr"><?= e(phone_local($site['phone'])) ?></bdo></a></li>
        <li><a href="<?= e($wa) ?>" target="_blank" rel="noopener noreferrer"><?= icon('chat') ?><?= e(t('whatsapp')) ?><span class="visually-hidden"> <?= e(t('new_tab')) ?></span></a></li>
        <li><a href="mailto:<?= e($site['email']) ?>"><?= icon('mail') ?><span dir="ltr"><?= e($site['email']) ?></span></a></li>
        <li><a href="<?= e($site['facebook']) ?>" target="_blank" rel="noopener noreferrer"><?= icon('facebook') ?><?= e(t('facebook')) ?><span class="visually-hidden"> <?= e(t('new_tab')) ?></span></a></li>
      </ul>
    </div>
    <nav aria-label="<?= e(t('pages')) ?>">
      <h2 class="footer-h"><?= e(t('pages')) ?></h2>
      <ul class="footer-list">
<?php foreach (t('nav') as $href => $label): ?>
        <li><a href="<?= e(lurl($href)) ?>"><?= e($label) ?></a></li>
<?php endforeach; ?>
      </ul>
    </nav>
  </div>
  <div class="footer-base"><p>© <?= e(num(date('Y'))) ?> <span translate="no"><?= e($site['name']) ?></span></p></div>
</footer>
<!--/email_off-->
</body>
</html>
