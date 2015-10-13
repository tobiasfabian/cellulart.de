<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="page error">
<?php snippet('mainnav') ?>

<div class="center" itemscope itemtype="http://schema.org/Event">
  <header>
    404
  </header>
  <main>
    <article>
      <div class="text">
        <h1><?=$page->title()->html()?></h1>
        <?=$page->text()->kirbytext()?>
      </div>
    </article>
  </main>
</div>


<?php snippet('mainfooter') ?>
</body>
</html>
