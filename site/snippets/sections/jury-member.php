<div class="jury-member">
  <h2><?=$section->name()?></h2>
  <?php if($section->image()->toFile()): ?>
  <img src="<?=thumb($section->image()->toFile(),array('height' => 160))->url()?>" srcset="<?=thumb($section->image()->toFile(),array('height' => 320))->url()?> 2x">
  <?php endif ?>
  <?= $section->text()->length() < 100 ? '<div class="text-center">' : null ?>
  <?=$section->text()->kirbytext()?>
  <?= $section->text()->length() < 100 ? '</div>' : null ?>
</div>
