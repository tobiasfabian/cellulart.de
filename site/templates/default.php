<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="<?=$page->uid()?>">
<?php snippet('mainnav') ?>

<div class="center">
  <main>
      <h1><?=$page->title()->html()?></h1>
  </main>
</div>


<?php snippet('mainfooter') ?>
</body>
</html>
