<div class="gallery">
  <?php
    $filenames = $section->images()->split(',');
    if(count($filenames) < 2) $filenames = array_pad($filenames, 2, '');
    $files = call_user_func_array(array($page->files(), 'find'), $filenames);
    $files = $files->sortBy('sort', 'asc');
  ?>
  <?php if(count($section->images()->split(',')) > 1): ?>
  <nav>
    <a class="previous"></a>
    <a class="next"></a>
  </nav>
  <?php endif; ?>
  <ul>
  <?php foreach($files as $file) : ?>
    <li>
      <figure itemscope itemtype="http://schema.org/ImageObject">
        <picture>
          <source itemprop="contentUrl" srcset="<?=thumb($file,array('height' => 640))->url()?>, <?=thumb($file,array('height' => 1280))->url()?> 2x" media="(min-width: 660px)">
          <source srcset="<?=thumb($file,array('height' => 340))->url()?>, <?=thumb($file,array('height' => 680))->url()?> 2x" media="(min-width: 380px)">
          <img srcset="<?=thumb($file,array('height' => 190))->url()?> 1x, <?=thumb($file,array('height' => 380))->url()?> 2x" alt="<?= $file->caption()->isEmpty() ? $file->name() : $file->caption() ?>">
        </picture>
        <?= !$file->caption()->isEmpty() ? '<figcaption itemprop="description">'.$file->caption()->kirbytextRaw().'</figcaption>' : null ?>
      </figure>
    </li>
  <?php endforeach ?>
  </ul>
</div>
