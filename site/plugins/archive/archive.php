<?php

require_once('db.php');

$db = new Db();

kirby()->hook('panel.page.create', function($page) {
  if ($page->parent()->template() == 'film-archive') {
    $page->update(array(
      'key' => str::random(16)
    ));
    $db = new Db();
    $db->insert($page);
  }
});
kirby()->hook('panel.page.update', function($page) {
  if ($page->parent()->template() == 'film-archive') {
    $db = new Db();
    $db->update($page);
  }
  if ($page->template() == 'film-archive') {
    $root = kirby()->roots()->content() . DS . 'film-archive' . DS;
    $genres     = site()->page('film-archive')->genres()->yaml();
    $categories = site()->page('film-archive')->categories()->yaml();
    $awards     = site()->page('film-archive')->awards()->yaml();
    $sections   = site()->page('film-archive')->sections()->yaml();
    $languages  = site()->page('film-archive')->langs()->yaml();
    $countries  = site()->page('film-archive')->countries()->yaml();
    $formats    = site()->page('film-archive')->formats()->yaml();

    try {
      $array = array();
      foreach($genres as $genre) {
        $array[str::slug($genre['english'])] = $genre['english'];
      }
      f::write($root.'genres.en.json',json_encode($array));
    } catch(Exception $e) {
      echo $e->getMessage();
    }
    try {
      $array = array();
      foreach($categories as $category) {
        $array[str::slug($category['english'])] = $category['english'];
      }
      f::write($root.'categories.en.json',json_encode($array));
    } catch(Exception $e) {
      echo $e->getMessage();
    }
    try {
      $array = array();
      foreach($awards as $awards) {
        $array[str::slug($awards['english'])] = $awards['english'];
      }
      f::write($root.'awards.en.json',json_encode($array));
    } catch(Exception $e) {
      echo $e->getMessage();
    }
    try {
      $array = array();
      foreach($sections as $section) {
        $array[str::slug($section['english'])] = $section['english'];
      }
      f::write($root.'sections.en.json',json_encode($array));
    } catch(Exception $e) {
      echo $e->getMessage();
    }
    try {
      $array = array();
      foreach(a::sort($languages,'english','ASC') as $language) {
        $array[$language['iso_639_1']] = $language['english'];
      }
      f::write($root.'languages.en.json',json_encode($array));
    } catch(Exception $e) {
      echo $e->getMessage();
    }
    try {
      $array = array();
      foreach(a::sort($countries,'english','ASC') as $country) {
        $array[$country['iso_3166_1']] = $country['english'];
      }
      f::write($root.'countries.en.json',json_encode($array));
    } catch(Exception $e) {
      echo $e->getMessage();
    }
    try {
      $array = array();
      foreach($formats as $format) {
        $array[str::slug($format['format'])] = $format['format'];
      }
      f::write($root.'formats.json',json_encode($array));
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }
});
kirby()->hook('panel.page.delete', function($page) {
  if ($page->parent()->template() == 'film-archive') {
    $db = new Db();
    $db->delete($page);
  }
});
