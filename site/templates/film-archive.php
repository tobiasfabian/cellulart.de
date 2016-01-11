<?php

header::type('application/json', 'UTF-8');

// ini_set('max_execution_time', 300); //300 seconds = 5 minutes

function createArchiveEntries($page) {
  for($i = 0; $i < 10; $i++) {
    $uri = str::random();
    $template = 'film-archive-entry';
    $data = array(
      'title' => str::random(),
      'still' => str::random(),
      'type' =>  str::random(),
      'country' =>  str::random(),
      'year' =>  str::random(),
      'duration' =>  str::random(),
      'director' => str::random(100),
      'text' =>  str::random(500),
    );
    $page->create('film-archiv/0-'.$uri,$template,$data);
  }
}

// createArchiveEntries($page);


function showArchiveEntries($page) {


  // FILTER
  // $children = $children->limit(10000);
  if (get('q')) {
    $children = $page->search(get('q'));
  } else {
    $children = $page->children();
  }

  // create JSON
  $json = array('count',$children->count());
  $elements = array();
  foreach($children as $child):
    $content = array(
      'title' => $child->title()->value(),
      'still' => $child->still()->value(),
      'type' => $child->type()->value(),
      'country' => $child->country()->value(),
      'year' => $child->year()->value(),
      'duration' => $child->duration()->value(),
      'director' => $child->director()->value(),
      'text' => $child->text()->value()
    );
    $element = array($child->uid() => $content);
    array_push($elements, $element);
  endforeach;
  array_push($json, array('elements' => $elements));

  return a::json($json);

}


echo showArchiveEntries($page);
