<section class="quote-band" aria-labelledby="quote-title">
  <div class="wrap quote-inner">
    <div>
      <h2 id="quote-title"><?= e(t('quote_title')) ?></h2>
      <p><?= e(t('quote_text')) ?> <?= sprintf(e(t('quote_write')), '<a href="mailto:' . e($site['email']) . '" dir="ltr">' . e($site['email']) . '</a>') ?></p>
    </div>
<?php $actions_inverse = true; $actions_class = 'quote-actions'; require ROOT . '/includes/partials/contact-actions.php'; $actions_inverse = false; $actions_class = ''; ?>
  </div>
</section>
