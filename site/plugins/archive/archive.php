<?php

require_once('db.php');

$db = new Db();

kirby()->hook('panel.page.create', function($page) {
  if ($page->template() == 'film-archive-entry') {
    $page->update(array(
      'key' => str::random(16)
    ));
    $db = new Db();
    $db->insert($page);
  }
});
kirby()->hook('panel.page.update', function($page) {
  if ($page->template() == 'film-archive-entry') {
    $db = new Db();
    $db->update($page);
  }
});
kirby()->hook('panel.page.delete', function($page) {
  if ($page->template() == 'film-archive-entry') {
    $db = new Db();
    $db->delete($page);
  }
});
