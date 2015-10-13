<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="page competition<?=$page->parents()->find('archiv') ? ' archive' : null?>">
<?php snippet('mainnav') ?>

<div class="center">
  <?php snippet('subnav') ?>
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
