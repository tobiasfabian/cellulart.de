<?php
class Db {

  public $database;
  public $films;

  function __construct() {
    $this->createDb();
    $this->createTable();
    $this->films = $this->database->table('films');
  }

  function insert($page) {
    $this->films->insert(array(
      'uri'      => $page->uri(),
      'title'    => $page->title(),
      'still'    => $page->still()->value(),
      'type'     => $page->type()->value(),
      'country'  => $page->country()->value(),
      'year'     => $page->year()->value(),
      'duration' => $page->duration()->value(),
      'director' => $page->director()->value(),
      'text'     => $page->text()->value()
    ));
  }

  function update($page) {
    $this->films->where('uri', '=', $page->uri())->update(array(
      'title'    => $page->title(),
      'still'    => $page->still()->value(),
      'type'     => $page->type()->value(),
      'country'  => $page->country()->value(),
      'year'     => $page->year()->value(),
      'duration' => $page->duration()->value(),
      'director' => $page->director()->value(),
      'text'     => $page->text()->value()
    ));;
  }

  function delete($page) {
    $this->films->where('uri', '=', $page->uri())->delete();
  }

  function insertExisiting() {
    foreach(page('film-archiv')->children() as $page) {
      $this->insert($page);
    }
  }

  function createDb() {
    $file  = kirby()->roots()->content() . '/film_archive.sqlite';
    $database = new Database(array(
      'type'     => 'sqlite',
      'database' => kirby()->roots()->content() . '/film_archive.sqlite'
    ));
    $this->database = $database;
  }

  function createTable() {
    $this->database->createTable('films', array(
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
