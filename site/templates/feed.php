<?php header::type('text/xml') ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">

<?php
$news = $page->parent();
?>

  <channel>
    <title><?= xml($site->title().' – '.$news->title()) ?></title>
    <link><?=$news->url()?></link>
    <generator>Kirby</generator>
    <lastBuildDate><?= date('r') ?></lastBuildDate>
    <atom:link href="<?= $page->url() ?>" rel="self" type="application/rss+xml" />
    <description><?= xml($news->meta_description()) ?></description>

    <?php foreach($news->children()->visible()->flip()->limit(20) as $item): ?>
    <item>
      <title><?= xml($item->title()) ?></title>
      <link><?= xml($item->url()) ?></link>
      <guid><?= xml($item->id()) ?></guid>
      <pubDate><?= $item->date('r') ?></pubDate>
      <description><![CDATA[<?= $item->text()->kirbytext() ?>]]></description>
      <content:encoded><![CDATA[<?= $item->text()->kirbytext().$item->text_continue()->kirbytext() ?>]]></content:encoded>
    </item>
    <?php endforeach ?>

  </channel>
</rss>
