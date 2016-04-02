<div class="text">
  <?php if (!$section->h1()->empty()): ?>
  <h1><?=nl2br($section->h1()->html())?></h1>
  <?php endif ?>
  <?=$section->text()->kirbytext() ?>
</div>
