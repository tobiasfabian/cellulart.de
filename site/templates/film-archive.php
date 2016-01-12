<?php

$start = time();

$db = new Db();
// $db->insert($page);
$results = $db->films->order('country DESC')
                     ->all();
print_r($results->toJson());

// $db->insertExisiting();


$end = time();
print_r($end - $start);
