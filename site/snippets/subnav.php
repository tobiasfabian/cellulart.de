<?php if($page->parent()->hasVisibleChildren()): ?>
<nav class="subnav">
  <?php
    if ($page->template() === 'competition') {
      $pages = $page->children();
    } else if ($page->parent() and $page->parent()->template() === 'competition') {
      $pages = $page->siblings();
    } else if ($page->parent()->parent() and $page->parent()->parent()->template() === 'archive') {
      $pages = $page->children();
    } else if ($page->parent()->parent()->parent() and $page->parent()->parent()->parent()->template() === 'archive') {
      $pages = $page->siblings();
    } else {
      $pages = false;
    }
  ?>
  <?php
    if ($pages):
    foreach($pages->visible() as $item):
  ?>
  <a href="<?=$item->url()?>"<?= $item->isOpen() ? ' class="active"' : null?>>
    <span><?=$item->title()->html()?></span><br>
    <span><?=$item->subtitle()->html()?></span>
  </a>
  <?php
    endforeach;
    endif
  ?>
</nav>
<?php endif ?>
