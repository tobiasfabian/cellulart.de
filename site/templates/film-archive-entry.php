<?php
if ($page->hasImages()) {
  $output = [];
  foreach($page->images() as $image) {
    array_push($output, thumb($image, array('height' => 500))->url());
  }
  echo a::json($output);
} else {
  echo 'No Data for '.$page->title().'';
}
