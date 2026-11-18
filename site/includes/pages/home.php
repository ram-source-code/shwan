<?php
/** @var array $site */
$r = $site['reasons'];
?>
<section class="hero" aria-labelledby="hero-title">
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <h1 id="hero-title"><?= e($site['hero']['title']) ?></h1>
      <p class="hero-lead"><?= e($site['hero']['lead']) ?></p>
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
  <div class="wrap split">
    <h2 id="about-title">About us</h2>
    <div class="prose">
      <p><?= e($site['about']) ?></p>
      <p><a class="link-arrow" href="<?= e(url('/about')) ?>">More about us<?= icon('arrow-right') ?></a></p>
    </div>
  </div>
</section>

<section class="section section-tint" aria-labelledby="why-title">
  <div class="wrap">
    <div class="section-head">
      <h2 id="why-title">Why choose us</h2>
    </div>
    <ul class="reasons" role="list">
<?php foreach ($r as $item): ?>
      <li class="reason">
        <h3><?= icon($item['icon']) ?><?= e($item['title']) ?></h3>
        <p><?= e($item['text']) ?></p>
      </li>
<?php endforeach; ?>
    </ul>
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

<?php require ROOT . '/includes/partials/quote-band.php'; ?>
<?php
return [
    'title' => 'Entersoftgroup | Software & IT company in Sulaymaniyah',
    'description' => 'Entersoftgroup is a software and IT company in Sulaymaniyah with 15+ years of experience. Software in Kurdish, Arabic and English, customized to your business, with 24/7 support.',
    'path' => '/',
];
