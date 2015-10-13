<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="association">
<?php snippet('mainnav') ?>
<div class="center">
  <main>
    <?php $team_photo = $page->team_photo()->toFile() ?>
    <img src="<?=thumb($team_photo,array('width' => 908))->url()?>" srcset="<?=thumb($team_photo,array('width' => 1816, 'quality' => 70))->url()?> 2x" <?php ecco(!$team_photo->caption()->isEmpty(),'alt="'.$team_photo->caption().'"')?>>
  </main>
</div>
<?php snippet('mainfooter') ?>
</body>
</html>
