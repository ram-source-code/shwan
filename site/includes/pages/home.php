<?php
$r = $site['reasons'];
?>
<section class="hero" aria-labelledby="hero-title">
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <h1 id="hero-title"><?= e($site['hero']['title']) ?></h1>
      <p class="hero-lead"><?= e($site['hero']['intro']) ?></p>
<?php require ROOT . '/includes/partials/contact-actions.php'; ?>
      <dl class="facts">
<?php foreach ($site['facts'] as $f): ?>
        <div class="fact"><dt><?= e($f['label']) ?></dt><dd><?= e($f['value']) ?><span><?= e($f['suffix']) ?></span></dd></div>
<?php endforeach; ?>
      </dl>
    </div>
    <figure class="hero-figure">
      <?= picture('founder-cutout', [480, 720, 960], 960, 1042, 'Shwan Baglama, founder and CEO of Entersoftgroup', '(min-width: 64rem) 34rem, (min-width: 40rem) 60vw, 88vw', true, 'hero-photo') ?>
      <figcaption><strong translate="no">Shwan Baglama</strong> Founder &amp; CEO</figcaption>
    </figure>
  </div>
</section>

<section class="section about-intro" aria-labelledby="about-title">
  <div class="wrap split split-center">
    <div class="prose">
      <h2 id="about-title">About us</h2>
      <p><?= e($site['about']) ?></p>
      <p><a class="link-arrow" href="<?= e(url('/about')) ?>">More about us<?= icon('arrow-right') ?></a></p>
    </div>
    <?= illus('work-desk', [800, 1200], 1200, 625, 'A man at a desk waving at a video call on his computer', '(min-width: 46rem) 36rem, 92vw', 'illus-wide') ?>
  </div>
</section>

<section class="section section-tint" aria-labelledby="why-title">
  <div class="wrap">
    <div class="why-grid">
    <div class="why-side">
      <h2 id="why-title">Why choose us</h2>
      <?= illus('feature-portrait', [569], 569, 698, 'A smiling man in a black T-shirt in front of an orange circle', '(min-width: 64rem) 22rem, (min-width: 46rem) 30vw, 70vw', 'illus-cutout') ?>
    </div>
    <ul class="reasons">
<?php foreach ($r as $item): ?>
      <li class="reason">
        <h3><?= icon($item['icon']) ?><?= e($item['title']) ?></h3>
        <p><?= e($item['text']) ?></p>
      </li>
<?php endforeach; ?>
    </ul>
    </div>
  </div>
</section>

<section class="section" aria-labelledby="team-title">
  <div class="wrap">
    <div class="section-head section-head-row">
      <h2 id="team-title">Our team</h2>
      <a class="link-arrow" href="<?= e(url('/team')) ?>">Meet the team<?= icon('arrow-right') ?></a>
    </div>
<?php require ROOT . '/includes/partials/team-grid.php'; ?>
  </div>
</section>

<div class="photo-band wrap">
  <div class="photo-grid">
<?php foreach ([1, 2, 5, 3, 4, 6, 7, 8] as $g): ?>
    <?= picture("gallery-$g", [$g === 5 ? 770 : 370], $g === 5 ? 770 : 370, $g === 5 ? 370 : ($g > 5 ? 235 : 370), '', ($g === 5 ? '(min-width: 46rem) 50vw, 100vw' : '(min-width: 46rem) 25vw, 50vw'), false, 'photo-tile photo-tile-' . $g) ?>
<?php endforeach; ?>
    <?= picture('portrait-round', [140], 140, 140, '', '7rem', false, 'photo-tile photo-tile-round') ?>
  </div>
  <p class="photo-note">Illustrative stock photography.</p>
</div>

<?php require ROOT . '/includes/partials/quote-band.php'; ?>
<?php
return [
    'title' => 'Entersoftgroup | Software & IT company in Sulaymaniyah',
    'description' => 'Entersoftgroup is a software and IT company in Sulaymaniyah with 15+ years of experience. Software in Kurdish, Arabic and English, customized to your business, with 24/7 support.',
    'path' => '/',
];
