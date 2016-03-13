<nav class="mainnav">
  <a class="togglenav close">
    <span></span>
    <span></span>
    <span></span>
  </a>
  <ul class="nav-1">
    <?php foreach ($pages->visible() as $item): ?>
    <li<?php ecco($item->isOpen(),' class="active"') ?>>
      <a href="<?=$item->url()?>">
        <?php if ($item->isHomePage()) : ?>
        <svg viewBox="0 0 20 20">
          <path d="M18,0 L10.2857791,0 L0,10.2857791 L0,18 L7.71431163,18 L18,7.71422092 L18,0 Z"></path>
        </svg>
        <?php else: ?>
        <span><?=$item->title()->html()?></span>
        <?php endif ?>
      </a>
      <?php if ($item->hasVisibleChildren() && $item->id() != 'news'): ?>
      <ul>
        <?php foreach($item->children()->visible() as $item): ?>
        <li>
          <a href="<?= $item->url() ?>">
            <span><?=$item->title()->html()?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </li>
    <?php endforeach ?>
  </ul>
  <?php if ($pages->findOpen()->hasChildren() &&
            $pages->findOpen()->id() !== 'news'): ?>
  <ul class="nav-2">
    <?php foreach ($pages->findOpen()->children()->visible() as $item): ?>
    <li<?php ecco($item->isOpen(),' class="active"') ?>>
      <a href="<?=$item->url()?>"><span><?=$item->title()->html()?></span></a>
      <?php if ($item->hasVisibleChildren() && $item->uid() != 'mitglieder'): ?>
      <ul>
        <?php foreach($item->children()->visible() as $item): ?>
        <li>
          <a href="<?= $item->url() ?>">
            <span><?=$item->title()->html()?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif ?>
    </li>
    <?php endforeach ?>
  </ul>
  <?php endif ?>
  <?php if ($page->parents()->find('archiv') &&
            $pages->findOpen()->id() === 'archiv'): ?>
  <ul class="nav-3">
    <?php foreach ($pages->findOpen()->children()->findOpen()->children()->visible() as $item): ?>
    <li<?php ecco($item->isOpen(),' class="active"') ?>>
      <a href="<?=$item->url()?>"><span><?=$item->title()->html()?></span></a>
    </li>
    <?php endforeach ?>
  </ul>
  <?php endif ?>
</nav>
