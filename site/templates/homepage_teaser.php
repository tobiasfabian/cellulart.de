<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="homepage invert">
<?php snippet('mainnav') ?>

<main>
  <div class="overlay">
    <h1>
      <span class="h1-1">cellu</span>
      <span class="h1-2">l’art</span>
    </h1>
    <time class="date">
      <?=$site->date('j','startdate')?>–<?=$site->date('j','enddate')?><br>
      <?=strftime('%B',$site->date(null,'enddate'))?>
    </time>
    <?php if (!$page->venue()->isEmpty()) :?>
    <div class="venue">
      <?=str_replace(' ','<br>',$site->venue())?>
    </div>
    <?php endif ?>
  </div>
  <div class="teaser">
    <?php if (!$page->teaservideo()->isEmpty()): ?>
      <video src="<?=$page->teaservideo()->toFile()->url()?>" poster="<?=!$page->teaserimage()->isEmpty() ? $page->teaserimage()->toFile()->url() : null ?>" autoplay loop></video>
    <?php endif ?>
    <?php if (!$page->teaserimage()->isEmpty()): ?>
      <img src="<?=$page->teaserimage()->toFile()->url()?>">
    <?php endif ?>
  </div>
</main>

<?php snippet('mainfooter') ?>
</body>
</html>
