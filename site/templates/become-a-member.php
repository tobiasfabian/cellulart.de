<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="become-a-member">
<?php snippet('mainnav') ?>

<div class="center">
  <header>
    <h1><?=$page->h1()->html()?></h1>
    <h2><?=$page->h2()->html()?></h2>
  </header>
  <?php if (!$page->infobox()->isEmpty()): ?>
  <aside>
    <?=$page->infobox()->kirbytext()?>
  </aside>
  <?php endif ?>
  <main>
    <?=$page->text()->kirbytext()?>
  </main>
</div>


<?php snippet('mainfooter') ?>
</body>
</html>
