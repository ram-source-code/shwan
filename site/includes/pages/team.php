<section class="page-hero" aria-labelledby="page-title">
  <div class="wrap">
    <h1 id="page-title"><?= e(t('team_title')) ?></h1>
    <p class="page-lead"><?= tx(t('team_lead')) ?></p>
  </div>
</section>

<section class="section" aria-labelledby="page-title">
  <div class="wrap">
<?php $team_heading_level = 'h2'; $team_lcp = true; require ROOT . '/includes/partials/team-grid.php'; ?>
  </div>
</section>

<?php require ROOT . '/includes/partials/quote-band.php'; ?>
<?php
[$mt, $md] = t('meta')['team'];
return ['title' => $mt, 'description' => $md, 'path' => '/team'];
