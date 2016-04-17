<article class="film<?= isset($award) ? ' award' : null ?>" itemscope itemtype="http://schema.org/Movie">
  <?php if (isset($award)): ?>
  <h1><?=$award->kirbytextRaw()?></h1>
  <?php endif ?>
  <header>
    <?php if (!$film->subtitle()->isEmpty()): ?>
    <h2><?=$film->subtitle()->html()?></h2>
    <h3 itemprop="name"><?=$film->title()->html()?></h3>
    <?php else: ?>
    <h2 itemprop="name"><?=$film->title()->html()?></h2>
    <?php endif ?>
  </header>
  <div class="thumbnail">
  <?php if (!$film->video()->isEmpty()): ?>
    <video src="<?= !$film->video()->isEmpty() ? $film->video()->toFile()->url() : null?>" <?=!$film->still()->isEmpty() ? 'poster="'.thumb($film->still()->toFile(),array('width' => 466, 'height' => 262, 'quality' => 70))->url().'"' : null?> loop muted autoplay webkit-playsinline>
    </video>
    <?php if (!$film->still()->isEmpty() AND $film->still()->toFile() !== null): ?>
    <link itemprop="image" href="<?=thumb($film->still()->toFile(),array('width' => 700, 'height' => 394, 'quality' => 70))->url()?>">
    <?php endif ?>
  <?php elseif (!$film->still()->isEmpty() AND $film->still()->toFile() !== null): ?>
    <img itemprop="image" src="<?=thumb($film->still()->toFile(),array('width' => 233, 'height' => 131, 'quality' => 70))->url()?>" srcset="<?=thumb($film->still()->toFile(),array('width' => 466, 'height' => 262, 'quality' => 70))->url()?>" alt="<?=l::get('film still'),' ',$film->title()?>">
  <?php endif ?>
  </div>
  <div class="info">
    <?= !$film->type()->isEmpty() ? '<span itemprop="genre">'.l::get($film->type()->value()).'</span>, ' : null ?><?= !$film->country()->isEmpty() ? $film->country()->translateCountry($site->language()) : null ?><?= !$film->year()->isEmpty() ? ', <time itemprop="datePublished" datetime="'.$film->year()->value().'">'.$film->year()->value().'</time>' : null ?><br>
    <?= !$film->duration()->isEmpty() ? '<time itemprop="duration" datetime="PT'.strstr($film->duration()->value(),':',true).'M'.substr(strrchr($film->duration()->value(),':'),1).'S">'.$film->duration()->value().' '.l::get('minutes').'</time>' : null ?>
  </div>
  <?php if (!$film->direction()->isEmpty()): ?>
  <div class="direction">
    <?=l::get('direction')?><br>
    <span itemprop="director"><?=$film->direction()->html()?></span>
  </div>
  <?php endif ?>
  <div itemprop="description">
  <?=$film->text()->kirbytext()?>
  </div>
</article>
