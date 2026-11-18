<?php
/** @var array $site */
$local = iraq_mobile_local($site['phone']);
?>
<section class="page-hero" aria-labelledby="page-title">
  <div class="wrap">
    <h1 id="page-title">Contact us</h1>
    <p class="page-lead"><?= e($site['quote']['text']) ?> Call, message or visit us.</p>
  </div>
</section>

<section class="section" aria-label="Ways to reach us">
  <div class="wrap contact-grid">
    <ul class="channels" role="list">
      <li>
        <a class="channel" href="tel:<?= e($site['phone']) ?>">
          <?= icon('phone') ?>
          <span class="channel-text"><span class="channel-name">Phone</span><span class="channel-value" dir="ltr"><?= e($local) ?></span></span>
        </a>
      </li>
      <li>
        <a class="channel" href="https://wa.me/<?= e(substr($site['phone'], 1)) ?>" target="_blank" rel="noopener noreferrer">
          <?= icon('chat') ?>
          <span class="channel-text"><span class="channel-name">WhatsApp<span class="visually-hidden"> (opens in a new tab)</span></span><span class="channel-value" dir="ltr"><?= e($local) ?></span></span>
        </a>
      </li>
      <li>
        <a class="channel" href="mailto:<?= e($site['email']) ?>">
          <?= icon('mail') ?>
          <span class="channel-text"><span class="channel-name">Email</span><span class="channel-value"><?= e($site['email']) ?></span></span>
        </a>
      </li>
      <li>
        <a class="channel" href="<?= e($site['facebook']) ?>" target="_blank" rel="noopener noreferrer">
          <?= icon('facebook') ?>
          <span class="channel-text"><span class="channel-name">Facebook<span class="visually-hidden"> (opens in a new tab)</span></span><span class="channel-value">/entersoftgroup</span></span>
        </a>
      </li>
    </ul>
    <div class="visit">
      <h2><?= icon('pin') ?>Visit our office</h2>
      <address>
        <span translate="no"><?= e($site['name']) ?></span><br>
        <?= e($site['address']['building']) ?><br>
        <?= e($site['address']['street']) ?><br>
        <?= e($site['address']['city']) ?>, <?= e($site['address']['region']) ?>, <?= e($site['address']['country']) ?>
      </address>
      <p><a class="btn btn-secondary" href="<?= e($site['maps_url']) ?>" target="_blank" rel="noopener noreferrer"><?= icon('map') ?>Open in Google Maps<span class="visually-hidden"> (opens in a new tab)</span></a></p>
    </div>
  </div>
</section>
<?php
return [
    'title' => 'Contact us',
    'description' => 'Call or WhatsApp Entersoftgroup on 0770 155 8796, email info@entersoftgroup.com, or visit us at Max Plaza, Shakraka, Sulaymaniyah.',
    'path' => '/contact',
];
