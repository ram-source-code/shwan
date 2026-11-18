<section class="quote-band" aria-labelledby="quote-title">
  <div class="wrap quote-inner">
    <div>
      <h2 id="quote-title"><?= e($site['quote']['title']) ?></h2>
      <p><?= e($site['quote']['text']) ?> Write to <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a> or call us.</p>
    </div>
<?php $actions_inverse = true; $actions_class = 'quote-actions'; require ROOT . '/includes/partials/contact-actions.php'; $actions_inverse = false; $actions_class = ''; ?>
  </div>
</section>
