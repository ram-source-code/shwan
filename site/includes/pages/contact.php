<?php
$local = phone_local($site['phone']);
$addr = t('address');
$nt = '<span class="visually-hidden"> ' . e(t('new_tab')) . '</span>';
?>
<section class="page-hero" aria-labelledby="page-title">
  <div class="wrap page-hero-inner">
    <span class="reg reg-a" aria-hidden="true"><?= icon('regmark') ?></span>
    <h1 id="page-title"><?= e(t('contact_title')) ?></h1>
    <p class="page-lead"><?= e(t('contact_lead')) ?></p>
  </div>
</section>

<section class="section" aria-labelledby="page-title">
  <div class="wrap contact-grid">
    <ul class="channels">
      <li><a class="channel" href="tel:<?= e($site['phone']) ?>"><?= icon('phone') ?><span class="channel-text"><span class="channel-name"><?= e(t('call')) ?></span><bdo class="channel-value" dir="ltr"><?= e($local) ?></bdo></span></a></li>
      <li><a class="channel" href="https://wa.me/<?= e(substr($site['phone'], 1)) ?>" target="_blank" rel="noopener noreferrer"><?= icon('chat') ?><span class="channel-text"><span class="channel-name"><?= e(t('whatsapp')) ?><?= $nt ?></span><bdo class="channel-value" dir="ltr"><?= e($local) ?></bdo></span></a></li>
      <li><a class="channel" href="mailto:<?= e($site['email']) ?>"><?= icon('mail') ?><span class="channel-text"><span class="channel-name"><?= e(t('email')) ?></span><span class="channel-value" dir="ltr"><?= e($site['email']) ?></span></span></a></li>
      <li><a class="channel" href="<?= e($site['facebook']) ?>" target="_blank" rel="noopener noreferrer"><?= icon('facebook') ?><span class="channel-text"><span class="channel-name"><?= e(t('facebook')) ?><?= $nt ?></span><span class="channel-value" dir="ltr">/entersoftgroup</span></span></a></li>
    </ul>
    <div class="visit">
      <h2><?= icon('pin') ?><?= e(t('visit_title')) ?></h2>
      <address>
        <span translate="no">Entersoftgroup</span><br>
        <?= e($addr[0]) ?><br><?= e($addr[1]) ?><br><?= e(implode(LANG === 'en' ? ', ' : '، ', array_slice($addr, 2))) ?>
      </address>
      <p><a class="btn btn-secondary" href="<?= e($site['maps_url']) ?>" target="_blank" rel="noopener noreferrer"><?= icon('pin') ?><?= e(t('maps')) ?><?= $nt ?></a></p>
    </div>
  </div>
</section>
<?php
[$mt, $md] = t('meta')['contact'];
return ['title' => $mt, 'description' => $md, 'path' => '/contact'];
