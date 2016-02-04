<?php
class Db {

  public $database;
  public $films;

  function __construct() {
    $this->createDb();
    $this->createTable();
    $this->films = $this->database->table('films');
    // $this->insertExisiting();
  }

  function insert($page) {
    $this->films->insert(array(
      'key'            => $page->key()->value(),
      'uri'            => $page->uri(),
      'title'          => $page->title()->value(),
      'title_en'       => $page->title_en()->value(),
      'title_de'       => $page->title_de()->value(),
      'genre'          => $page->genre()->value(),
      'category'       => $page->category()->value(),
      'tags'           => $page->tags()->value(),
      'duration'       => $page->duration()->value(),
      'year'           => $page->year()->value(),
      'country'        => $page->country()->value(),
      'language'       => $page->language()->value(),
      'subtitles'      => $page->subtitles()->value(),
      'synposis_de'    => $page->synposis_de()->value(),
      'synposis_en'    => $page->synposis_en()->value(),
      'direction'      => $page->direction()->value(),
      'screenplay'     => $page->screenplay()->value(),
      'cinematography' => $page->cinematography()->value(),
      'editing'        => $page->editing()->value(),
      'production'     => $page->production()->value(),
      'composer'       => $page->composer()->value(),
      'music'          => $page->music()->value(),
      'actors'         => $page->actors()->value(),
      'section'        => $page->section()->value(),
      'festival_year'  => $page->festival_year()->value(),
      'awards'         => $page->awards()->value(),
      'formats'        => $page->formats()->value(),
      'location'       => $page->location()->value(),
      'contact'        => $page->contact()->value(),
      'address'        => $page->address()->value(),
      'email'          => $page->email()->value(),
      'phone'          => $page->phone()->value(),
      'website'        => $page->website()->value()
    ));
  }

  function update($page) {
    $this->films->where('key', '=', $page->key()->value())->update(array(
      'uri'            => $page->uri(),
      'title'          => $page->title()->value(),
      'title_de'       => $page->title_de()->value(),
      'title_en'       => $page->title_en()->value(),
      'genre'          => $page->genre()->value(),
      'category'       => $page->category()->value(),
      'tags'           => $page->tags()->value(),
      'duration'       => $page->duration()->value(),
      'year'           => $page->year()->value(),
      'country'        => $page->country()->value(),
      'language'       => $page->language()->value(),
      'subtitles'      => $page->subtitles()->value(),
      'synposis_de'    => $page->synposis_de()->value(),
      'synposis_en'    => $page->synposis_en()->value(),
      'direction'      => $page->direction()->value(),
      'screenplay'     => $page->screenplay()->value(),
      'cinematography' => $page->cinematography()->value(),
      'editing'        => $page->editing()->value(),
      'production'     => $page->production()->value(),
      'composer'       => $page->composer()->value(),
      'music'          => $page->music()->value(),
      'actors'         => $page->actors()->value(),
      'section'        => $page->section()->value(),
      'festival_year'  => $page->festival_year()->value(),
      'awards'         => $page->awards()->value(),
      'formats'        => $page->formats()->value(),
      'location'       => $page->location()->value(),
      'contact'        => $page->contact()->value(),
      'address'        => $page->address()->value(),
      'email'          => $page->email()->value(),
      'phone'          => $page->phone()->value(),
      'website'        => $page->website()->value()
    ));;
  }

  function delete($page) {
    $this->films->where('key', '=', $page->key()->value())->delete();
  }

  function insertExisiting() {
    foreach(page('film-archive')->children() as $page) {
      $this->insert($page);
    }
  }

  function createDb() {
    $file  = kirby()->roots()->content() . DS . 'film-archive' .DS. 'film_archive.sqlite';
    $database = new Database(array(
      'type'     => 'sqlite',
      'database' => $file
    ));
    $this->database = $database;
  }

  function createTable() {
    $this->database->createTable('films', array(
      'key' => array(
        'type' => 'text',
        'key'  => 'unique',
      ),
      'uri' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'title' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'title_de' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'title_en' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'genre' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'category' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'tags' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'duration' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'year' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'country' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'language' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'subtitles' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'synposis_de' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'synposis_en' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'direction' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'screenplay' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'cinematography' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'editing' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'production' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'composer' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'music' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'actors' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'section' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'festival_year' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'awards' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'formats' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'location' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'contact' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'address' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'email' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'phone' => array(
        'type' => 'text',
        'key'  => 'index',
      ),
      'website' => array(
        'type' => 'text',
        'key'  => 'index',
      )
    ));
  }

}
