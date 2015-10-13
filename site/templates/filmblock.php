<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="filmblock<?=$page->parents()->find('archiv') ? ' archive' : null?>">
<?php snippet('mainnav') ?>

<div class="center">
  <?php
  $page->content('en')->update(array(
    'direction'         => 'n1ce'
  ));
  ?>
  <?php snippet('subnav') ?>
  <main itemscope itemtype="http://schema.org/MovieSeries">
    <header>
      <div class="text">
        <h1 itemprop="name">
          <?=$page->title()->html()?><br>
          <?=$page->subtitle()->html()?><br>
        </h1>
        <p itemprop="description">
          <?=$page->text()->kirbytextRaw()?>
        </p>
        <p class="meta">
          <?php foreach($page->dates()->toStructure() as $item) :?>
          <span itemscope itemtype="http://schema.org/Event">
            <meta itemprop="name" content="<?=$page->title().' – '.$page->subtitle()?>">
            <meta itemprop="organizer" content="<?=$site->title()?>">
            <?php if(!$page->venue()->isEmpty()): ?>
            <span itemprop="location" itemscope itemtype="http://schema.org/Place">
              <meta itemprop="name" content="<?=$page->venue()?>">
              <?php if(!$page->street()->isEmpty() AND !$page->zip()->isEmpty() AND !$page->city()->isEmpty()): ?>
              <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                <meta itemprop="streetAddress" content="<?=$page->street()?>">
                <meta itemprop="postalCode" content="<?=$page->zip()?>">
                <meta itemprop="addressLocality" content="<?=$page->city()?>">
              </span>
              <?php endif ?>
            </span>
            <?php endif ?>
            <link itemprop="workPerformed" href="<?=$page->url()?>">
            <time itemprop="startDate" datetime="<?=$item->date('c')?>"><?=strftime('%A, %e. %B %Y',$item->date('U'))?>, <?=$item->time()?></time><br>
          </span>
          <?php endforeach ?>
          <?php if(!$page->venue()->isEmpty()): ?>
          <span><?=$page->venue()->html()?></span>
          <?php endif ?>
        </p>
      </div>
      <div class="video" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
        <?php if (!$page->blockvideo()->isEmpty()): ?>
          <svg class="play" viewBox="0 0 52 52">
            <path d="M0,0 L52,0 L52,36 L36,52 L0,52 L0,0 Z M17,38 L38,26 L17,14 L17,38 Z"></path>
          </svg>
          <video src="<?= $page->blockvideo()->toFile()->url() ?>" <?= !$page->blockimage()->isEmpty() ? 'poster="'.$page->blockimage()->toFile()->url().'"' : null ?> preload="auto"></video>
          <?= $page->blockimage()->toFile() !== null ? '<link itemprop="thumbnailUrl" href="'.$page->blockimage()->toFile()->url().'">' : null ?>
        <?php elseif (!$page->blockimage()->isEmpty() AND $page->blockimage()->toFile() !== null): ?>
          <img src="<?=$page->blockimage()->toFile()->url()?>">
        <?php elseif (!$page->bockvideo_vimeo()->isEmpty()): ?>
          <?= embed::vimeo($page->bockvideo_vimeo()) ?>
        <?php endif ?>
      </div>
      <div class="clear"></div>
    </header>
    <?php if ($page->hasVisibleChildren()): ?>
    <div class="films">
      <?php foreach($page->children()->visible() as $film): ?>
        <?php snippet('film',array('film' => $film)); ?>
      <?php endforeach ?>
    </div>
    <?php endif ?>
  </main>
</div>


<?php snippet('mainfooter') ?>
</body>
</html>
