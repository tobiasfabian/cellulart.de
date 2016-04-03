<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="filmblock<?=$page->parents()->find('archiv') ? ' archive' : null?>">
<?php snippet('mainnav') ?>

<div class="center">
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
          <span class="event" itemscope itemtype="http://schema.org/Event">
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
          <?php if(!$item->datetime()->isEmpty()): ?>
            <time itemprop="startDate" datetime="<?=$item->date('c', 'datetime')?>"><?=strftime('%a, %e. %B %Y',$item->date('U', 'datetime'))?>, <?=$item->date('H:i', 'datetime'), ' ', l::get('o’clock')?></time>
          <?php else: ?>
            <time itemprop="startDate" datetime="<?=$item->date('c')?>"><?=strftime('%A, %e. %B %Y',$item->date('U'))?>, <?=$item->time()?></time>
          <?php endif; ?>
          <?php if(!$item->facebook_event()->isEmpty()) : ?>
            <a href="<?= $item->facebook_event() ?>" target="_blank" class="button small">FB Event</a>
          <?php endif; ?>
          <?php if(!$item->tickets_url()->isEmpty()) : ?>
            <a href="<?= $item->tickets_url() ?>" target="_blank" class="button small">Tickets</a>
          <?php endif; ?>
            <br>
          </span>
        <?php endforeach ?>
        <?php if(!$page->venue()->isEmpty()): ?>
          <span><?=$page->venue()->html()?></span>
        <?php endif ?>
        </p>
        <?php snippet('share', array('item' => $page)) ?>
      </div>
      <?php if (!$page->blockvideo()->isEmpty()): ?>
      <div class="video" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
          <svg class="play" viewBox="0 0 52 52">
            <path d="M0,0 L52,0 L52,36 L36,52 L0,52 L0,0 Z M17,38 L38,26 L17,14 L17,38 Z"></path>
          </svg>
          <video src="<?= $page->blockvideo()->toFile()->url() ?>" <?= !$page->blockimage()->isEmpty() ? 'poster="'.$page->blockimage()->toFile()->resize(505, null, 80)->url().'"' : null ?> preload="auto"></video>
          <?= !$page->blockimage()->isEmpty() ? '<link itemprop="thumbnailUrl" href="'.$page->blockimage()->toFile()->resize(505 * 2, null, 80)->url().'">' : null ?>
      </div>
      <?php elseif (!$page->blockimage()->isEmpty() AND $page->blockimage()->toFile() !== null): ?>
        <img class="image" src="<?=$page->blockimage()->toFile()->resize(505, null, 80)->url()?>" srcset="<?=$page->blockimage()->toFile()->resize(505 * 2, null, 80)->url()?> 2x">
      <?php elseif (!$page->bockvideo_vimeo()->isEmpty()): ?>
        <?= embed::vimeo($page->bockvideo_vimeo()) ?>
      <?php endif ?>
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
