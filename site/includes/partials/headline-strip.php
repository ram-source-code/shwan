<?php
$hl = ['ckb' => require ROOT . '/includes/lang/ckb.php', 'en' => require ROOT . '/includes/lang/en.php', 'ar' => require ROOT . '/includes/lang/ar.php'];
?>
<ul class="headline-strip">
<?php foreach ($hl as $code => $l): if ($code === LANG) continue; ?>
  <li lang="<?= e($code) ?>" dir="<?= e($l['dir']) ?>"><?= icon('regmark') ?><?= e($l['hero_title']) ?></li>
<?php endforeach; ?>
</ul>
