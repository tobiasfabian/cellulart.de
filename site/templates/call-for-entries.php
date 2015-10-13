<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="call-for-entries invert">
<?php snippet('mainnav') ?>
<div class="center">
  <main>
    <h1>
      <span>call</span>
      <span>for</span>
      <span>entries</span>
    </h1>
    <div class="text">
      <?=$page->text()->kt()?>
      <div class="downloads">
        <?php
          $filenames = $page->downloads()->split(',');
          if(count($filenames) < 2) $filenames = array_pad($filenames, 2, '');
          $files = call_user_func_array(array($page->files(), 'find'), $filenames);
          foreach($files as $file) : ?>
        <a href="<?=$file->url()?>" class="button" download="<?=$file->filename()?>"><?=$file->caption()->isEmpty() ? $file->filename() : $file->caption()->html() ?></a>
        <?php endforeach ?>
        <?php if(!$page->reelport_link()->isEmpty()): ?>
        <a href="<?=$page->reelport_link()?>" target="blank" class="button">Reelport</a>
        <?php endif ?>
        <div class="clear"></div>
      </div>
    </div>
  </main>
</div>
<?php snippet('mainfooter') ?>
</body>
</html>
