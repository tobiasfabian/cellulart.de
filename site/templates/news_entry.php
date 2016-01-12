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
    <article itemscope itemtype="http://schema.org/Article">
      <header>
        <time class="time" itemprop="datePublished" datetime="<?=$page->date('c')?>"><?=strftime('%e.<br>%b',$page->date('U'))?></time>
        <h1 itemprop="headline" itemprop="headline"><?=$page->title()->html()?></h1>
      </header>
      <div itemprop="text" class="text">
        <?= $page->text()->kirbytext() ?>
        <?= $page->text_continue()->kirbytext() ?>
      </div>
    </article>
    <nav class="pagination">
      <?php if($page->hasPrevVisible()): ?>
      <a class="previous" href="<?= $page->prevVisible()->url() ?>">
        <span><?=$page->prevVisible()->title()?></span>
      </a>
      <?php endif ?>
      <?php if($page->hasNextVisible()): ?>
      <a class="next" href="<?= $page->nextVisible()->url() ?>">
        <span><?=$page->nextVisible()->title()?></span>
      </a>
      <?php endif ?>
    </nav>
  </main>
</div>
<?php snippet('mainfooter') ?>
</body>
</html>
