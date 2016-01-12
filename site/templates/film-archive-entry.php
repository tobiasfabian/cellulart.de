<?php

$db = new Db();
$db->insert($page);
print_r($db->films->all());
