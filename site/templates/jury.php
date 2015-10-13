<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="jury">
<?php snippet('mainnav') ?>

<main class="center">
  <h1 hidden><?= $page->title()->html() ?></h1>
  <?php foreach($page->builder()->toStructure() as $section): ?>
    <?php snippet('sections/'.$section->_fieldset(), array('section' => $section)) ?>
  <?php endforeach ?>
</main>


<?php snippet('mainfooter') ?>
</body>
</html>
