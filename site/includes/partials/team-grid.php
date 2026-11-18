<?php
$hn = $team_heading_level ?? 'h3';
$eager = !empty($team_lcp);
?>
<ul class="team-grid">
<?php foreach ($site['team'] as $i => $m): ?>
  <li class="member<?= $i === 0 ? ' member-lead' : '' ?>">
    <?= picture($m['img'], [370], 370, 480, 'Portrait of ' . $m['name'], '(min-width: 64rem) 18rem, (min-width: 40rem) 30vw, 45vw', $eager && $i === 0, 'member-photo') ?>
    <<?= $hn ?> class="member-name" translate="no"><?= e($m['name']) ?></<?= $hn ?>>
    <p class="member-role"><?= e($m['role']) ?></p>
  </li>
<?php endforeach; ?>
</ul>
