<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="news">
<?php snippet('mainnav') ?>
<div class="center">
  <aside>
    <?php snippet('events') ?>
    <?php snippet('social_media') ?>
  </aside>
  <main>
    <?php $items = $page->children()->visible()->flip()->paginate(4); ?>
    <?php foreach($items as $item) : ?>
    <article itemscope itemtype="http://schema.org/Article">
      <header>
        <a href="<?=$item->url()?>" class="time">
          <time itemprop="datePublished" datetime="<?=$item->date('c')?>"><?=strftime('%e.<br>%b',$item->date('U'))?></time>
        </a>
        <h1 itemprop="headline" itemprop="headline"><?=$item->title()->html()?></h1>
      </header>
      <div itemprop="text" class="text">
        <?= $item->text()->kirbytext() ?>
      </div>
      <?= !$item->text_continue()->isEmpty() ? '<a href="'.$item->url().'">'.l::get('read more').'</a>' : null ?>
    </article>
    <?php endforeach ?>
    <?php if($items->pagination()->hasPages()): ?>
    <nav class="pagination">
      <?php if($items->pagination()->hasNextPage()): ?>
      <a class="next" href="<?= $items->pagination()->nextPageURL() ?>">
        <span><?=l::get('next page')?></span>
      </a>
      <?php endif ?>
      <?php if($items->pagination()->hasPrevPage()): ?>
      <a class="previous" href="<?= $items->pagination()->prevPageURL() ?>">
        <span><?=l::get('previous page')?></span>
      </a>
      <?php endif ?>
    </nav>
    <?php endif ?>
  </main>
</div>
<?php snippet('mainfooter') ?>
</body>
</html>
