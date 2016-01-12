<footer class="mainfooter">
  <a href="<?=$site->homePage()->url()?>" class="logo"></a>
  <?php if ($site->language()->code() === 'de') : ?>
  <a href="<?=$page->url('en')?>" lang="en" class="langswitch"><?=$site->language('en')->name()?></a>
  <?php else: ?>
  <a href="<?=$page->url('de')?>" lang="de" class="langswitch"><?=$site->language('de')->name()?></a>
  <?php endif ?>
  <nav>
    <div>
      <?php foreach ($pages->find('meta')->children()->visible() as $item): ?>
      <a href="<?=$item->url()?>"><?=$item->title()->html()?></a>
      <?php endforeach ?>
    </div>
  </nav>
</footer>
<?php
// snippet('raster');
?>
<?php if (url::host() !== 'localhost'): ?>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//cellulart.de/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><img src="//cellulart.de/piwik/piwik.php?idsite=1" alt=""></noscript>
<!-- End Piwik Code -->
<?php endif; ?>
