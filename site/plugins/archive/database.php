<?php
class Database {

  public $database;

  public function __construct() {

    if(!is_writable(kirby()->roots()->content())) {
      throw new Exception('The library is not writable');
    }

    $this->createDb();
  }

  function createDb() {
    $file  = kirby()->roots()->content() . '/film_archive.sqlite';
    $database = new Database(array(
      'type'     => 'sqlite',
      'database' => kirby()->roots()->content() . '/film_archive.sqlite'
    ));
  }

}
