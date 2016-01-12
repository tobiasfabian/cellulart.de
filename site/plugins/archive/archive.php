<?php

require_once('database.php');

$db = new Database();

kirby()->hook('panel.page.create', function($page) {
  if ($page->template() == 'film-archive-entry') {
    $archive->insert($page);
    $page->update(array(
      'text' => 'Some text'
    ));
  }
});
kirby()->hook('panel.page.update', function($page) {
  if ($page->template() == 'film-archive-entry') {
    try {
      $page->update(array(
        'type' => 'Some text'
      ));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }
});
kirby()->hook('panel.page.delete', function($page) {
  if ($page->template() == 'film-archive-entry') {

  }
});
