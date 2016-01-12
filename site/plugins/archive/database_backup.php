<?php
class Database {

  public $database;
  public $films;
  public $test = 'testen';

  function __construct() {
    $this->createDb();
    if (!is_null($this->database->table('films'))) {
      $this->createTable();
    } else {
      $films = $this->database->table('films');
    }
  }

  function createDb() {
    $file  = kirby()->roots()->content() . '/film_archive.sqlite';
    $database = new Database(array(
      'type'     => 'sqlite',
      'database' => kirby()->roots()->content() . '/film_archive.sqlite'
    ));
  }

  function table() {
    return $this->database->table('films');
  }

  public function insert($page) {
    $items->insert(array(
      'uri'      => $page->uri(),
      'title'    => $page->title()
    ));
  }

  private function createTable() {
    $database->createTable('films', array(
      'uri' => array(
        'type' => 'text',
        'key'  => 'unique',
      ),
      'title' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'still' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'type' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'country' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'year' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'duration' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'director' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'text' => array(
        'type' => 'text',
        'key'  => 'index',
      )
    ));
  }

}
