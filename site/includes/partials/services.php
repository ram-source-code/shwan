<?php $svc_icons = ['database', 'sliders', 'shield', 'headset']; ?>
<section class="section services" aria-labelledby="services-title">
  <div class="wrap">
    <h2 id="services-title" class="section-title"><?= e(t('services_title')) ?></h2>
    <ul class="services-grid">
<?php foreach (t('services') as $i => [$h, $p]): ?>
      <li class="service<?= $i === 0 ? ' service-lead' : '' ?>">
        <?= icon($svc_icons[$i] ?? 'cube') ?>
        <h3><?= e($h) ?></h3>
        <p><?= e($p) ?></p>
      </li>
<?php endforeach; ?>
    </ul>
  </div>
</section>
