<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="page <?=$page->parents()->find('archiv') ? ' archive' : null?>">
<?php snippet('mainnav') ?>

<main class="center">
  <?php snippet('subnav') ?>
  <article>
    <h1 hidden><?php echo $page->title()->html() ?></h1>
    <?php foreach($page->builder()->toStructure() as $section): ?>
      <?php snippet('sections/'.$section->_fieldset(), array('section' => $section)) ?>
    <?php endforeach ?>
  </article>
</main>


<?php snippet('mainfooter') ?>
</body>
</html>
