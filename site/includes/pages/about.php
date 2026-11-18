<?php /** @var array $site */ ?>
<section class="page-hero" aria-labelledby="page-title">
  <div class="wrap">
    <h1 id="page-title">About us</h1>
    <p class="page-lead"><?= e($site['hero']['lead']) ?></p>
  </div>
</section>

<section class="section" aria-labelledby="story-title">
  <div class="wrap split">
    <div class="prose">
      <h2 id="story-title" class="visually-hidden">Our story</h2>
      <p class="prose-lg"><?= e($site['about']) ?></p>
      <dl class="facts facts-inline">
<?php foreach ($site['facts'] as $f): ?>
        <div class="fact"><dt><?= e($f['label']) ?></dt><dd><?= e($f['value']) ?><span><?= e($f['suffix']) ?></span></dd></div>
<?php endforeach; ?>
      </dl>
    </div>
    <div class="collage">
      <?= picture('training-room', [400], 400, 440, 'A training session in a classroom: the presenter points at software projected in Kurdish on the screen', '(min-width: 64rem) 25rem, 80vw', false, 'collage-main') ?>
      <?= illus('laptop-pair', [400], 400, 257, 'Two colleagues looking at a laptop together', '(min-width: 64rem) 16rem, 55vw', 'collage-side') ?>
      <?= picture('portrait-small', [162], 162, 104, '', '10rem', false, 'collage-chip') ?>
    </div>
  </div>
</section>

<section class="section section-tint" aria-labelledby="tour-title">
  <div class="wrap split split-center">
    <div class="prose">
      <h2 id="tour-title"><?= e($site['tour']['title']) ?></h2>
      <p>Our office is at <?= e($site['address']['building']) ?>, <?= e($site['address']['street']) ?>, <?= e($site['address']['city']) ?>.</p>
      <p><a class="link-arrow" href="<?= e(url('/contact')) ?>">How to find us<?= icon('arrow-right') ?></a></p>
    </div>
    <?= illus('office-desk-bw', [640, 960], 960, 494, 'Black-and-white photo of a man working on a laptop while a colleague looks on', '(min-width: 46rem) 36rem, 92vw', 'illus-wide') ?>
  </div>
</section>

<section class="section" aria-labelledby="skills-title">
  <div class="wrap split split-center">
    <?= illus('notes-desk', [570], 570, 560, 'A woman in glasses writing notes at a desk', '(min-width: 46rem) 30rem, 92vw') ?>
    <div class="skills">
      <h2 id="skills-title">Skillset</h2>
      <ul>
<?php foreach ($site['skills'] as $i => $s): ?>
        <li class="skill">
          <span class="skill-label" id="skill-<?= $i ?>"><?= e($s['label']) ?></span>
          <span class="skill-value"><?= e((string)$s['value']) ?>%</span>
          <meter class="skill-meter" min="0" max="100" value="<?= e((string)$s['value']) ?>" aria-labelledby="skill-<?= $i ?>"><?= e((string)$s['value']) ?>%</meter>
        </li>
<?php endforeach; ?>
      </ul>
      <p><a class="btn btn-primary" href="<?= e(url('/contact')) ?>">Hire us now</a></p>
    </div>
  </div>
</section>

<?php require ROOT . '/includes/partials/quote-band.php'; ?>
<?php
return [
    'title' => 'About us',
    'description' => 'Entersoftgroup helps businesses elevate their value: 15+ years and 99+ projects of software, IT consulting and support from our office in Sulaymaniyah.',
    'path' => '/about',
];
