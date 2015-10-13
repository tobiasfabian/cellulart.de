<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="page archive-entry<?=$page->parents()->find('archiv') ? ' archive' : null?>">
<?php snippet('mainnav') ?>

<div class="center">
  <main>
    <?php if (!$page->text()->isEmpty()): ?>
    <section class="text">
      <?=$page->text()->kirbytext()?>
    </section>
    <?php endif ?>
    <?php if (!$page->awards()->isEmpty()): ?>
    <section class="winner">
      <h1><?=l::get('awards')?> <?=$page->title()?></h1>
      <div class="films">
      <?php foreach($page->awards()->toStructure() as $item):
        $film = $page->children()->find($item->film());
      ?>
      <?php snippet('film',array(
        'film' => $film,
        'award' => $item->award()
      )); ?>
      <?php endforeach ?>
      </div>
    </section>
    <?php endif ?>
    <?php if(!$page->text()->isEmpty()): ?>
    <?php endif ?>
    <?php if(!$page->gallery_images()->isEmpty()): ?>
    <div class="gallery">
      <nav>
        <a class="previous"></a>
        <a class="next"></a>
      </nav>
      <?php
        $filenames = $page->gallery_images()->split(',');
        if(count($filenames) < 2) $filenames = array_pad($filenames, 2, '');
        $files = call_user_func_array(array($page->files(), 'find'), $filenames);
        $files = $files->sortBy('sort', 'asc');
      ?>
      <ul>
      <?php foreach($files as $file) : ?>
        <li>
          <figure itemscope itemtype="http://schema.org/ImageObject">
            <picture>
              <source srcset="<?=thumb($file,array('height' => 640))->url()?>, <?=thumb($file,array('height' => 1280))->url()?> 2x" media="(min-width: 660px)">
              <source srcset="<?=thumb($file,array('height' => 340))->url()?>, <?=thumb($file,array('height' => 680))->url()?> 2x" media="(min-width: 380px)">
              <img itemprop="contentUrl" srcset="<?=thumb($file,array('height' => 190))->url()?> 1x, <?=thumb($file,array('height' => 380))->url()?> 2x" alt="<?= $file->caption()->isEmpty() ? $file->name() : $file->caption() ?>">
            </picture>
            <?= !$file->caption()->isEmpty() ? '<figcaption itemprop="description">'.$file->caption()->kirbytextRaw().'</figcaption>' : null ?>
          </figure>
        </li>
      <?php endforeach ?>
      </ul>
    </div>
    <?php endif ?>
    <?php if (!$page->downloads()->isEmpty()): ?>
    <section class="downloads">
      <h1>Downloads</h1>
      <?php
        $filenames = $page->downloads()->split(',');
        if(count($filenames) < 2) $filenames = array_pad($filenames, 2, '');
        $files = call_user_func_array(array($page->files(), 'find'), $filenames);
        foreach($files as $file) : ?>
        <a href="<?=$file->url()?>" class="button" download="<?=$file->filename()?>" target="_blank"><?=$file->filename().' ('.$file->niceSize().')'?></a>
        <?php endforeach ?>
    </section>
    <?php endif ?>
  </main>
</div>


<?php snippet('mainfooter') ?>
</body>
</html>
