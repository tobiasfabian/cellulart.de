<?php

$start = time();

$db = new Db();
// $db->insertExisiting();

// pagination
$page = 1;
if (array_key_exists('page',url::params())) {
  $page = url::params()['page'];
}

$films = $db->films;

if ($search = get('search')) {
  $films = $films->where(  'uri',            'LIKE', '%'.$search.'%')
                 ->orWhere('title',          'LIKE', '%'.$search.'%')
                 ->orWhere('title_en',       'LIKE', '%'.$search.'%')
                 ->orWhere('title_de',       'LIKE', '%'.$search.'%')
                 ->orWhere('genre',          'LIKE', '%'.$search.'%')
                 ->orWhere('category',       'LIKE', '%'.$search.'%')
                 ->orWhere('tags',           'LIKE', '%'.$search.'%')
                 ->orWhere('duration',       'LIKE', '%'.$search.'%')
                 ->orWhere('year',           'LIKE', '%'.$search.'%')
                 ->orWhere('country',        'LIKE', '%'.$search.'%')
                 ->orWhere('language',       'LIKE', '%'.$search.'%')
                 ->orWhere('subtitles',      'LIKE', '%'.$search.'%')
                 ->orWhere('synposis_de',    'LIKE', '%'.$search.'%')
                 ->orWhere('synposis_en',    'LIKE', '%'.$search.'%')
                 ->orWhere('direction',      'LIKE', '%'.$search.'%')
                 ->orWhere('screenplay',     'LIKE', '%'.$search.'%')
                 ->orWhere('cinematography', 'LIKE', '%'.$search.'%')
                 ->orWhere('editing',        'LIKE', '%'.$search.'%')
                 ->orWhere('production',     'LIKE', '%'.$search.'%')
                 ->orWhere('composer',       'LIKE', '%'.$search.'%')
                 ->orWhere('music',          'LIKE', '%'.$search.'%')
                 ->orWhere('actors',         'LIKE', '%'.$search.'%')
                 ->orWhere('section',        'LIKE', '%'.$search.'%')
                 ->orWhere('festival_year',  'LIKE', '%'.$search.'%')
                 ->orWhere('awards',         'LIKE', '%'.$search.'%')
                 ->orWhere('formats',        'LIKE', '%'.$search.'%')
                 ->orWhere('location',       'LIKE', '%'.$search.'%')
                 ->orWhere('contact',        'LIKE', '%'.$search.'%')
                 ->orWhere('address',        'LIKE', '%'.$search.'%')
                 ->orWhere('email',          'LIKE', '%'.$search.'%')
                 ->orWhere('phone',          'LIKE', '%'.$search.'%')
                 ->orWhere('website',        'LIKE', '%'.$search.'%');
}

$films = $films->order('title ASC')->page($page, 100);
// print_r($films);
$pagination = $films->pagination();
$pagination->nextPageURL();

$duration = time()-$start;

$output = array(
            'count' => $films->count(),
            'films' => $films->toArray(),
          );

if ($pagination) {
  $paginationArray = $pagination->toArray();
  if ($pagination->nextPageUrl() && $pagination->nextPageUrl() != url::current()) {
    $paginationArray['nextPageUrl'] = $pagination->nextPageUrl();
  }
  if ($pagination->prevPageURL() && $pagination->prevPageURL() != url::current()) {
    $paginationArray['prevPageURL'] = $pagination->prevPageURL();
  }
  $output['pagination'] = $paginationArray;
}

echo a::json($output);
