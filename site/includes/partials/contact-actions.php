<?php
/** @var array $site */
/** Optional: $actions_class (extra class), $actions_inverse (bool, on navy ground) */
$cls = 'actions' . (!empty($actions_class) ? ' ' . $actions_class : '');
$inv = !empty($actions_inverse);
?>
<div class="<?= e($cls) ?>">
  <a class="btn <?= $inv ? 'btn-accent' : 'btn-primary' ?>" href="tel:<?= e($site['phone']) ?>"><?= icon('phone') ?>Call <span dir="ltr"><?= e(iraq_mobile_local($site['phone'])) ?></span></a>
  <a class="btn <?= $inv ? 'btn-ghost-inverse' : 'btn-secondary' ?>" href="https://wa.me/<?= e(substr($site['phone'], 1)) ?>" target="_blank" rel="noopener noreferrer"><?= icon('chat') ?>WhatsApp<span class="visually-hidden"> (opens in a new tab)</span></a>
</div>
