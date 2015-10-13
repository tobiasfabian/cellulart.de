<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="contact">
<?php snippet('mainnav') ?>

<div class="center">
  <main>
      <h1><?=$page->title()->html()?></h1>
      <?=$page->text()->kirbytext()?>
  </main>
  <aside>
    <?php snippet('social_media') ?>
  </aside>
</div>


<?php snippet('mainfooter') ?>
</body>
</html>
