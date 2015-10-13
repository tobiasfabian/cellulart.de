<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="member">
<?php snippet('mainnav') ?>
<div class="center">
  <main>
    <?php foreach($page->children()->visible() as $item): ?>
    <article>
      <header>
        <h1><?=$item->title()->html()?></h1>
        <h2><?=$item->assignment()->html()?></h2>
      </header>
      <?php if(!$item->photo()->isEmpty()): ?>
      <img src="<?=thumb($item->photo()->toFile(),array('width' => 112, 'height' => 152, 'crop' => true))->url()?>" srcset="<?=thumb($item->photo()->toFile(),array('width' => 224, 'height' => 304, 'crop' => true,'quality' => 70))->url()?> 2x">
      <?php endif ?>
      <div class="text">
        <?=$item->text()->kirbytext()?>
      </div>
    </article>
  <?php endforeach ?>
  </main>
</div>
<?php snippet('mainfooter') ?>
</body>
</html>
