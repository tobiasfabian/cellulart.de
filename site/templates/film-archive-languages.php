<?php
  header::contentType('application/json');

  $languages = $site->langs()->toStructure()->sortBy('iso_639_1');
  $languagsJSON = array();
  foreach($languages as $language) {
    $languagsJSON[$language->iso_639_1()->value()] = $language->english()->value();
  }
  echo json_encode($languagsJSON);
