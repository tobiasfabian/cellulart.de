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
  $films = $films->where(  'uri',      'LIKE', '%'.$search.'%')
                 ->orWhere('title',    'LIKE', '%'.$search.'%')
                 ->orWhere('still',    'LIKE', '%'.$search.'%')
                 ->orWhere('type',     'LIKE', '%'.$search.'%')
                 ->orWhere('country',  'LIKE', '%'.$search.'%')
                 ->orWhere('year',     'LIKE', '%'.$search.'%')
                 ->orWhere('duration', 'LIKE', '%'.$search.'%')
                 ->orWhere('director', 'LIKE', '%'.$search.'%')
                 ->orWhere('text',     'LIKE', '%'.$search.'%');
}

$films = $films->order('uri ASC')->page($page, 100);
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
