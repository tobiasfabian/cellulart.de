<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
<?php if ($page->template() == 'news_entry'): ?>
  <meta name="desciption" content="<?= $page->text()->excerpt(140) ?>">
  <meta property="og:description" content="<?= $page->text()->excerpt(420) ?>">
<?php else: ?>
  <meta name="desciption" property="og:description" content="<?= !$page->meta_description()->isEmpty() ? $page->meta_description() : $site->meta_description() ?>">
<?php endif; ?>
  <meta property="og:title" content="<?=$page->title()?>">
  <meta property="og:site_name" content="<?=$site->title()?>">
<?php if ($page->template() == 'news_entry' AND $page->hasImages()): ?>
  <meta property="og:image" content="<?=$page->image()->url()?>">
<?php elseif ($page->template() == 'association' AND !$page->team_photo()->isEmpty()): ?>
  <meta property="og:image" content="<?=$page->team_photo()->toFile()->resize(908 * 2, null, 80)->url()?>">
<?php elseif ($page->template() == 'filmblock' AND !$page->blockimage()->isEmpty()): ?>
  <meta property="og:image" content="<?=$page->blockimage()->toFile()->resize(505 * 2, null, 80)->url()?>">
<?php else: ?>
  <meta property="og:image" content="<?=url('assets/images/fb-share-image.jpg')?>">
<?php endif; ?>
  <meta property="og:url" content="<?=$page->url()?>">
<?php if($site->language()->code() == 'en') : ?>
  <meta property="og:locale" content="<?=$site->language('en')->locale()?>">
  <meta property="og:locale:alternate" content="<?=$site->language('de')->locale()?>">
<?php else: ?>
  <meta property="og:locale" content="<?=$site->language('de')->locale()?>">
  <meta property="og:locale:alternate" content="<?=$site->language('en')->locale()?>">
<?php endif; ?>

<?php if ($page->template() == 'filmblock'): ?>
<?php if (!$page->blockimage()->isEmpty()): ?>
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image" content="<?= $page->blockimage()->toFile()->resize(505 * 2, null, 80)->url() ?>">
  <meta name="twitter:creator" content="@cellulart_">
<?php else: ?>
  <meta name="twitter:card" content="summary">
<?php endif; ?>
  <meta name="twitter:site" content="@cellulart_">
  <meta name="twitter:title" content="<?= $page->title()->html() .' – '. $page->subtitle()->html() ?>">
  <meta name="twitter:description" content="<?= $page->text()->html() ?>.">
<?php endif; ?>

  <link rel="stylesheet" href="<?=url('assets/css/style.css')?>">
<?php if($site->language()->code() == 'de') : ?>
  <link rel="alternate" hreflang="en" href="<?=$page->url('en')?>">
<?php else: ?>
  <link rel="alternate" hreflang="de" href="<?=$page->url('de')?>">
<?php endif ?>
<?php if ($page->isHomePage() || $page->uid() === 'news'): ?>
  <link rel="alternate" type="application/rss+xml" href="<?= url('news/rss') ?>" title="News Feed" />
<?php endif ?>
  <link rel="apple-touch-icon" href="<?=url('assets/images/apple-touch-icon.png')?>">

  <script src="<?=url('assets/js/script.js')?>" defer></script>

  <?php
  $title;
  if ($page->isHomePage()) {
    $title = $site->title()->html();
  } else if ($page->template() == 'archive_entry') {
    $year = $page->title()->html();
    $title = $site->title()->html() . ' ' . $year;
  } else if ($page->parents()->filterBy('template', 'archive_entry')->first()) {
    $year = $page->parents()->filterBy('template', 'archive_entry')->first()->title()->html();
    $title = $page->title()->html() . ' - ' . $site->title()->html() . ' ' . $year;
  } else {
    $title = $page->title()->html() . ' - ' . $site->title()->html();
  }
  ?>

  <title><?= strtolower($title) ?></title>

</head>
