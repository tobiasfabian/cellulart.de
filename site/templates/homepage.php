<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="homepage invert">
<?php snippet('mainnav') ?>
<div class="center">
  <main>
    <div class="overlay">
      <h1>
        <span hidden>cellu l’art</span>
        <img src="<?=url('assets/images/cellu.svg')?>" class="cellu" alt="cellu">
        <img src="<?=url('assets/images/lart.svg')?>" class="lart" alt="lart">
      </h1>
      <time class="date">
        <?=$site->date('j','startdate')?>–<?=$site->date('j','enddate')?><br>
        <?=strftime('%B',$site->date(null,'enddate'))?>
      </time>
      <?php if (!$site->venue()->isEmpty()) :?>
      <div class="venue">
        <?=str_replace(' ','<br>',$site->venue())?>
      </div>
      <?php endif ?>
      <div class="call-for-entries">
        <h2>Call <span>for</span> entries</h2>
        <a href="<?=url('festival/call-for-entries')?>" class="button"><?=l::get('apply now')?></a>
      </div>
    </div>
  </main>
</div>
<?php snippet('mainfooter') ?>
</body>
</html>
