<?php
kirby()->hook('panel.page.create', function($page) {
  if ($page->template() == 'site') {
    // $page
  }
});
kirby()->hook('panel.page.update', function($page) {
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
      foreach(a::sort($genres,'english','ASC') as $genre) {
        $array[str::slug($genre['english'])] = $genre['english'];
      }
      f::write($root.'genres.en.json',json_encode($array));
    } catch(Exception $e) {
      echo $e->getMessage();
    }
    try {
      $array = array();
      foreach(a::sort($categories,'english','ASC') as $category) {
        $array[str::slug($category['english'])] = $category['english'];
      }
      f::write($root.'categories.en.json',json_encode($array));
    } catch(Exception $e) {
      echo $e->getMessage();
    }
    try {
      $array = array();
      foreach(a::sort($awards,'english','ASC') as $awards) {
        $array[str::slug($awards['english'])] = $awards['english'];
      }
      f::write($root.'awards.en.json',json_encode($array));
    } catch(Exception $e) {
      echo $e->getMessage();
    }
    try {
      $array = array();
      foreach(a::sort($sections,'english','ASC') as $section) {
        $array[str::slug($section['english'])] = $section['english'];
      }
      f::write($root.'section.en.json',json_encode($array));
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
      foreach(a::sort($formats,'english','ASC') as $format) {
        $array[str::slug($format['format'])] = $format['format'];
      }
      f::write($root.'formats.json',json_encode($array));
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }
});
