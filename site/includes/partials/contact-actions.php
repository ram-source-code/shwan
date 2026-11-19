<?php
$cls = 'actions' . (!empty($actions_class) ? ' ' . $actions_class : '');
$inv = !empty($actions_inverse);
?>
<div class="<?= e($cls) ?>">
  <a class="btn <?= $inv ? 'btn-accent' : 'btn-primary' ?>" href="tel:<?= e($site['phone']) ?>"><?= icon('phone') ?><?= e(t('call')) ?> <bdo dir="ltr"><?= e(phone_local($site['phone'])) ?></bdo></a>
  <a class="btn <?= $inv ? 'btn-ghost-inverse' : 'btn-secondary' ?>" href="https://wa.me/<?= e(substr($site['phone'], 1)) ?>" target="_blank" rel="noopener noreferrer"><?= icon('chat') ?><?= e(t('whatsapp')) ?><span class="visually-hidden"> <?= e(t('new_tab')) ?></span></a>
</div>
