<?php /** @var array $site */ ?>
<section class="page-hero" aria-labelledby="page-title">
  <div class="wrap">
    <h1 id="page-title">Our team</h1>
    <p class="page-lead">The people behind Entersoftgroup’s software, in Sulaymaniyah.</p>
  </div>
</section>

<section class="section" aria-label="Team members">
  <div class="wrap">
<?php $team_heading_level = 'h2'; $team_lcp = true; require ROOT . '/includes/partials/team-grid.php'; ?>
  </div>
</section>

<?php require ROOT . '/includes/partials/quote-band.php'; ?>
<?php
return [
    'title' => 'Our team',
    'description' => 'Meet the Entersoftgroup team: Shwan Baglama (Founder & CEO), Frman H. Ahmed (Head of Developers), Dyarko M. Muhammad and Arya A. Qadir (Developers).',
    'path' => '/team',
];
