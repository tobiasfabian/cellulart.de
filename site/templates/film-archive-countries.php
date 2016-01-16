<?php
  header::contentType('application/json');

  $languages = $site->countries()->toStructure()->sortBy('iso_3166_1');
  $languagsJSON = array();
  foreach($languages as $language) {
    $languagsJSON[$language->iso_3166_1()->value()] = $language->english()->value();
  }
  echo json_encode($languagsJSON);
