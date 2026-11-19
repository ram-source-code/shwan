<?php
$all = ['ckb' => require ROOT . '/includes/lang/ckb.php', 'en' => require ROOT . '/includes/lang/en.php', 'ar' => require ROOT . '/includes/lang/ar.php'];
$order = array_merge([LANG], array_values(array_diff(array_keys($all), [LANG])));
?>
<section class="section proof" aria-labelledby="proof-title">
  <div class="wrap">
    <h2 id="proof-title"><?= e(t('proof_title')) ?></h2>
    <ol class="proof-sheet">
<?php foreach ($order as $i => $code): $l = $all[$code]; ?>
      <li class="proof-panel<?= $i === 0 ? ' proof-panel-lead' : '' ?>" lang="<?= e($code) ?>" dir="<?= e($l['dir']) ?>">
        <p class="proof-text"><?= e($l['proof_text']) ?></p>
        <p class="proof-label"><?= icon('regmark') ?><?= e($l['name']) ?></p>
      </li>
<?php endforeach; ?>
    </ol>
  </div>
</section>
