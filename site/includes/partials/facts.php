<dl class="facts<?= !empty($facts_class) ? ' ' . e($facts_class) : '' ?>">
<?php foreach ($site['facts'] as $i => $v): ?>
  <div class="fact"><dt><?= e(t('facts')[$i]) ?></dt><dd><?= e(num($v)) ?><span>+</span></dd></div>
<?php endforeach; ?>
</dl>
