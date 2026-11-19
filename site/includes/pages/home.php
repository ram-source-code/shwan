<?php $icons = $site['icons']; ?>
<section class="hero" aria-labelledby="hero-title">
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <h1 id="hero-title"><?= e(t('hero_title')) ?></h1>
<?php require ROOT . '/includes/partials/headline-strip.php'; ?>
      <p class="hero-lead"><?= tx(t('hero_intro')) ?></p>
<?php require ROOT . '/includes/partials/contact-actions.php'; ?>
<?php require ROOT . '/includes/partials/facts.php'; ?>
    </div>
    <figure class="hero-figure">
      <span class="reg reg-a" aria-hidden="true"><?= icon('regmark') ?></span>
      <span class="reg reg-b" aria-hidden="true"><?= icon('regmark') ?></span>
      <?= picture('founder-cutout', [480, 720, 960], 960, 1042, sprintf(t('portrait_of'), 'Shwan Baglama'), '(min-width: 64rem) 30rem, (min-width: 46rem) 42vw, 19rem', true, 'hero-photo') ?>
      <figcaption><strong translate="no" dir="ltr">Shwan Baglama</strong><?= e(t('founder_role')) ?></figcaption>
    </figure>
  </div>
</section>

<?php require ROOT . '/includes/partials/proof.php'; ?>
<div class="ornament ornament-section" aria-hidden="true"></div>

<section class="section section-tint" aria-labelledby="about-title">
  <div class="wrap split split-center">
    <div class="prose">
      <h2 id="about-title"><?= e(t('about_title')) ?></h2>
      <p><?= e(t('about')) ?></p>
      <p><a class="link-arrow" href="<?= e(lurl('/about')) ?>"><?= e(t('more_about')) ?><?= icon('arrow-right') ?></a></p>
    </div>
    <figure class="plate">
      <?= picture('training-room', [400], 400, 440, t('training_alt'), '(min-width: 46rem) 25rem, 90vw', false, 'plate-photo') ?>
    </figure>
  </div>
</section>

<section class="section" aria-labelledby="why-title">
  <div class="wrap">
    <h2 id="why-title" class="section-title"><?= e(t('why_title')) ?></h2>
    <div class="sheet">
      <span class="reg reg-a" aria-hidden="true"><?= icon('regmark') ?></span>
      <ul class="reasons">
<?php foreach (t('reasons') as $i => [$h, $p]): ?>
        <li class="reason">
          <h3><?= icon('cube') ?><?= e($h) ?></h3>
          <p><?= e($p) ?></p>
        </li>
<?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>

<section class="section section-tint" aria-labelledby="team-title">
  <div class="wrap">
    <div class="section-head-row">
      <h2 id="team-title" class="section-title"><?= e(t('team_title')) ?></h2>
      <a class="link-arrow" href="<?= e(lurl('/team')) ?>"><?= e(t('meet_team')) ?><?= icon('arrow-right') ?></a>
    </div>
<?php require ROOT . '/includes/partials/team-grid.php'; ?>
  </div>
</section>

<?php require ROOT . '/includes/partials/quote-band.php'; ?>
<?php
[$mt, $md] = t('meta')['home'];
return ['title' => $mt, 'description' => $md, 'path' => '/'];
