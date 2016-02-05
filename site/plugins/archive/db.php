<?php
class Db {

  public $database;
  public $films;

  function __construct() {
    $this->createDb();
    $this->createTable();
    $this->films = $this->database->table('films');
    $this->insertExisiting();
  }

  function insert($page) {
    $minutes = strstr($page->duration()->value(),':',true);
    $seconds = substr(strstr($page->duration()->value(),':'),1);
    $seconds = $minutes*60+$seconds;
    $this->films->insert(array(
      'key'            => $page->key()->value(),
      'uri'            => $page->uid(),
      'title'          => $page->title()->value(),
      'title_en'       => $page->title_en()->value(),
      'title_de'       => $page->title_de()->value(),
      'genre'          => $page->genre()->value(),
      'category'       => $page->category()->value(),
      'tags'           => $page->tags()->value(),
      'duration'       => $seconds,
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
    $minutes = strstr($page->duration()->value(),':',true);
    $seconds = substr(strstr($page->duration()->value(),':'),1);
    $seconds = $minutes*60+$seconds;
    $this->films->where('key', '=', $page->key()->value())->update(array(
      'uri'            => $page->uid(),
      'title'          => $page->title()->value(),
      'title_de'       => $page->title_de()->value(),
      'title_en'       => $page->title_en()->value(),
      'genre'          => $page->genre()->value(),
      'category'       => $page->category()->value(),
      'tags'           => $page->tags()->value(),
      'duration'       => $seconds,
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
    $this->films->delete();
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
        'type' => 'text'
      ),
      'uri' => array(
        'type' => 'text'
      ),
      'title' => array(
        'type' => 'text'
      ),
      'title_de' => array(
        'type' => 'text'
      ),
      'title_en' => array(
        'type' => 'text'
      ),
      'genre' => array(
        'type' => 'text'
      ),
      'category' => array(
        'type' => 'text'
      ),
      'tags' => array(
        'type' => 'text'
      ),
      'duration' => array(
        'type' => 'timestamp'
      ),
      'year' => array(
        'type' => 'text'
      ),
      'country' => array(
        'type' => 'text'
      ),
      'language' => array(
        'type' => 'text'
      ),
      'subtitles' => array(
        'type' => 'text'
      ),
      'synposis_de' => array(
        'type' => 'text'
      ),
      'synposis_en' => array(
        'type' => 'text'
      ),
      'direction' => array(
        'type' => 'text'
      ),
      'screenplay' => array(
        'type' => 'text'
      ),
      'cinematography' => array(
        'type' => 'text'
      ),
      'editing' => array(
        'type' => 'text'
      ),
      'production' => array(
        'type' => 'text'
      ),
      'composer' => array(
        'type' => 'text'
      ),
      'music' => array(
        'type' => 'text'
      ),
      'actors' => array(
        'type' => 'text'
      ),
      'section' => array(
        'type' => 'text'
      ),
      'festival_year' => array(
        'type' => 'text'
      ),
      'awards' => array(
        'type' => 'text'
      ),
      'formats' => array(
        'type' => 'text'
      ),
      'location' => array(
        'type' => 'text'
      ),
      'contact' => array(
        'type' => 'text'
      ),
      'address' => array(
        'type' => 'text'
      ),
      'email' => array(
        'type' => 'text'
      ),
      'phone' => array(
        'type' => 'text'
      ),
      'website' => array(
        'type' => 'text'
      )
    ));
  }

}
