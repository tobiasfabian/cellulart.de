<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="homepage invert">
<?php snippet('mainnav') ?>
<main class="center">
  <?php if ($page->quicklinks()): ?>
  <ul class="quicklinks">
    <?php foreach($page->quicklinks()->toStructure() as $link): ?>
    <li>
      <a href="<?= $link->url() ?>" class="button invert"><?= $link->name() ?></a>
    </li>
    <?php endforeach ?>
  </ul>
  <?php endif ?>
  <div class="overlay">
    <h1>
      <span hidden>cellu l’art</span>
      <img src="<?=url('assets/images/cellu.svg')?>" class="cellu" alt="">
      <img src="<?=url('assets/images/lart.svg')?>" class="lart" alt="">
    </h1>
    <time class="date">
      <?=$site->date('j.','startdate')?>–<?=$site->date('j.','enddate')?><br>
      <?=strftime('%B %Y',$site->date(null,'enddate'))?>
    </time>
    <?php if (!$site->venue()->isEmpty()) :?>
    <div class="venue">
      <?=str_replace(' ','<br>',$site->venue())?>
    </div>
    <?php endif ?>
  </div>
  <div class="teaser">
    <?php if (!$page->teaservideo()->isEmpty()): ?>
      <video poster="<?=!$page->teaserimage()->isEmpty() ? $page->teaserimage()->toFile()->url() : null ?>" autoplay>
        <?php
        // Transform the comma-separated list of filenames into a file collection
        $filenames = $page->teaservideo()->split(',');
        if(count($filenames) < 2) $filenames = array_pad($filenames, 2, '');
        $files = call_user_func_array(array($page->files(), 'find'), $filenames);

        // Use the file collection
        foreach($files->sortBy('sort','asc') as $file) :
          $media = !$file->media()->isEmpty() ? ' media="'.$file->media().'"' : null;
        ?>
        <source src="<?=$file->url()?>" type="<?=$file->mime()?>"<?=$media?>>
        <?php
        endforeach;
        ?>
      </video>
    <?php endif ?>
    <?php if (!$page->teaserimage_mobile()->isEmpty()): ?>
      <img src="<?=$page->teaserimage_mobile()->toFile()->url()?>">
    <?php endif ?>
  </div>
</main>
<?php snippet('mainfooter') ?>
</body>
</html>
