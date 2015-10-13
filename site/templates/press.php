<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="press">
<?php snippet('mainnav') ?>

<div class="center">
  <main>
      <h1><?=$page->title()->html()?></h1>
      <?=$page->text()->kirbytext()?>
  </main>
  <?php if (!$page->downloads()->isEmpty()): ?>
  <aside>
    <div class="downloads">
      <h1>Downloads</h1>
      <?php
        $filenames = $page->downloads()->split(',');
        if(count($filenames) < 2) $filenames = array_pad($filenames, 2, '');
        $files = call_user_func_array(array($page->files(), 'find'), $filenames);
      ?>
      <ul>
        <?php foreach($files as $file) : ?>
        <li><a href="<?=$file->url()?>"><?=$file->text()->isEmpty() ? $file->filename() : $file->text()->html()?></a></li>
        <?php endforeach ?>
      </ul>
    </div>
    <?php snippet('social_media') ?>
  </aside>
  <?php endif ?>
</div>


<?php snippet('mainfooter') ?>
</body>
</html>
