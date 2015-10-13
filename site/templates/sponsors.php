<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="sponsors">
<?php snippet('mainnav') ?>

<div class="center">
  <main>
    <ul>
      <?php foreach($page->logos()->toStructure() as $logo): ?>
      <li>
        <?php if(!$logo->url()->isEmpty()): ?>
        <a href="<?=$logo->url()?>">
        <?php else: ?>
        <div>
        <?php endif ?>
          <img src="<?=thumb($logo->logo()->toFile(),array('width' => 142, 'height' => 72))->url()?>" srcset="<?=thumb($logo->logo()->toFile(),array('width' => 284, 'height' => 144))->url()?> 2x">
        <?php if(!$logo->url()->isEmpty()): ?>
        </a>
        <?php else: ?>
        </div>
        <?php endif ?>
      </li>
      <?php endforeach ?>
    </ul>
  </main>
</div>


<?php snippet('mainfooter') ?>
</body>
</html>
