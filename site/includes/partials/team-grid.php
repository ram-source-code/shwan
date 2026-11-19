<?php
$hn = $team_heading_level ?? 'h3';
$eager = !empty($team_lcp);
$roles = t('roles');
?>
<ul class="team-grid">
<?php foreach ($site['team'] as $i => $m): ?>
  <li class="member<?= $i === 0 ? ' member-lead' : '' ?>">
    <div class="member-plate"><?= picture(str_replace('team-', 'duo-', $m['img']), [370], 370, 480, sprintf(t('portrait_of'), $m['name']), '(min-width: 46rem) 18rem, 45vw', $eager && $i === 0, 'member-photo', $eager) ?></div>
    <<?= $hn ?> class="member-name" translate="no" dir="ltr"><?= e($m['name']) ?></<?= $hn ?>>
    <p class="member-role"><?= e($roles[$i]) ?></p>
  </li>
<?php endforeach; ?>
</ul>
