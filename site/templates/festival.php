<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="page festival">
<?php snippet('mainnav') ?>

<div class="center" itemscope itemtype="http://schema.org/Event">
  <meta itemprop="name" content="<?=$site->title()?>">
  <meta itemprop="startDate" content="<?=$site->date('c','startdate')?>">
  <meta itemprop="endDate" content="<?=$site->date('c','enddate')?>">
  <header>
    <div class="date">
      <?=$site->date('j.','startdate')?>–<?=$site->date('j.','enddate')?><br>
      <?=strftime('%B %Y',$site->date(null,'enddate'))?>
    </div>
    <div class="venue" itemprop="location">
      <?=str_replace(' ','<br>',$site->venue())?>
    </div>
  </header>
  <main>
    <article>
      <h1 hidden><?php echo $page->title()->html() ?></h1>
      <?php foreach($page->builder()->toStructure() as $section): ?>
        <?php snippet( snippet('sections/' . $section->_fieldset(), array('section' => $section)) ) ?>
      <?php endforeach ?>
    </article>
  </main>
</div>


<?php snippet('mainfooter') ?>
</body>
</html>
