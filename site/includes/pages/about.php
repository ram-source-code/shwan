<?php $skills = t('skills'); ?>
<section class="page-hero" aria-labelledby="page-title">
  <div class="wrap">
    <h1 id="page-title"><?= e(t('about_title')) ?></h1>
    <p class="page-lead"><?= tx(t('lead')) ?></p>
  </div>
</section>

<section class="section" aria-labelledby="story-title">
  <div class="wrap split split-center">
    <div class="prose">
      <h2 id="story-title" class="visually-hidden"><?= e(t('about_title')) ?></h2>
      <p class="prose-lg"><?= e(t('about')) ?></p>
<?php $facts_class = 'facts-inline'; require ROOT . '/includes/partials/facts.php'; $facts_class = ''; ?>
    </div>
    <figure class="plate">
      <span class="reg reg-a" aria-hidden="true"><?= icon('regmark') ?></span>
      <?= picture('training-duo', [400], 400, 440, t('training_alt'), '(min-width: 46rem) 25rem, 90vw', false, 'plate-photo') ?>
    </figure>
  </div>
</section>

<?php require ROOT . '/includes/partials/proof.php'; ?>

<section class="section section-tint" aria-labelledby="tour-title">
  <div class="wrap split split-center">
    <div class="prose">
      <h2 id="tour-title"><?= e(t('tour_title')) ?></h2>
      <p><?= e(sprintf(t('office_at'), implode(LANG === 'en' ? ', ' : '، ', array_slice(t('address'), 0, 3)))) ?></p>
      <p><a class="link-arrow" href="<?= e(lurl('/contact')) ?>"><?= e(t('find_us')) ?><?= icon('arrow-right') ?></a></p>
    </div>
    <div class="skills">
      <h2 id="skills-title"><?= e(t('skills_title')) ?></h2>
      <ul>
<?php foreach ($site['skills'] as $i => $v): ?>
        <li class="skill">
          <span class="skill-label" id="skill-<?= $i ?>"><?= e($skills[$i]) ?></span>
          <span class="skill-value"><?= e(num((string)$v)) ?><?= LANG === 'en' ? '%' : '٪' ?></span>
          <meter class="skill-meter" min="0" max="100" value="<?= $v ?>" aria-labelledby="skill-<?= $i ?>"><?= $v ?>%</meter>
        </li>
<?php endforeach; ?>
      </ul>
      <p><a class="btn btn-primary" href="<?= e(lurl('/contact')) ?>"><?= e(t('hire')) ?></a></p>
    </div>
  </div>
</section>

<?php require ROOT . '/includes/partials/quote-band.php'; ?>
<?php
[$mt, $md] = t('meta')['about'];
return ['title' => $mt, 'description' => $md, 'path' => '/about'];
