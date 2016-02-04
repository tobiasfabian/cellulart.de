<?php
function arrayFromJsonFile($file = 'genres',$lang = 'en') {
  $root = kirby()->roots()->content().DS.'film-archive'.DS;
  $array = str::parse(f::read($root.$file.'.'.$lang.'.json'),'json');
  return $array;
}
$file  = kirby()->roots()->content() . DS . 'film-archive' .DS. 'film_archive.sqlite';
$database = new Database(array(
  'type'     => 'sqlite',
  'database' => $file
));
$films = $database->table('films');
?>
<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="<?=url('assets/css/style-film_archive.css')?>">
  <script src="<?=url('assets/js/script-film_archive-min.js')?>" defer></script>
  <title><?=$site->title()->html().' '.strtolower($page->title()->html())?></title>
<body class="film-archive">

<header id="header">
  <div>
    <h1><a href="<?=$page->url()?>"><?=$site->title()->html().' '.strtolower($page->title()->html())?></a></h1>
    <form class="center">
      <div class="row">
        <input name="title" type="text" placeholder="Original Title">
        <select name="genre">
          <option value="" disabled selected>Genre</option>
          <?php foreach(arrayFromJsonFile('genres') as $key => $value): ?>
          <option value="<?=$key?>"><?=$value?></option>
          <?php endforeach; ?>
        </select>
        <select name="category">
          <option value="" disabled selected>Category</option>
          <?php foreach(arrayFromJsonFile('categories') as $key => $value): ?>
          <option value="<?=$key?>"><?=$value?></option>
          <?php endforeach; ?>
        </select>
        <select name="duration">
          <option value="" disabled selected>Duration</option>
          <option value="">&lt; 5 min</option>
          <option value="">5-10 min</option>
          <option value="">10-15 min</option>
          <option value="">15-30 min</option>
          <option value="">&gt; 30 min</option>
        </select>
        <input name="year" type="number" placeholder="Year" min="1900" max="2100">
        <select name="country">
          <option value="" disabled selected>Country</option>
          <?php foreach(arrayFromJsonFile('countries') as $key => $value): ?>
          <option value="<?=$key?>"><?=$value?></option>
          <?php endforeach; ?>
        </select>
        <select name="language">
          <option value="" disabled selected>Language</option>
          <?php foreach(arrayFromJsonFile('languages') as $key => $value): ?>
          <option value="<?=$key?>"><?=$value?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="row">
        <input name="title_de" type="text" placeholder="German Title">
        <input name="title_en" type="text" placeholder="English Title">
        <select name="tag">
          <option value="" disabled selected>Tag</option>
          <?php foreach(arrayFromJsonFile('tags') as $key => $value): ?>
          <option value="<?=$key?>"><?=$value?></option>
          <?php endforeach; ?>
        </select>
        <select name="subtitle">
          <option value="" disabled selected>Subtitle</option>
          <?php foreach(arrayFromJsonFile('languages') as $key => $value): ?>
          <option value="<?=$key?>"><?=$value?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="row">
        <input name="snyopsis_de" type="text" placeholder="Snyopsis (de)">
        <input name="snyopsis_en" type="text" placeholder="Snyopsis (en)">
      </div>
      <div class="row">
        <input name="direction" type="text" placeholder="Direction">
        <input name="screenplay" type="text" placeholder="Screenplay">
        <input name="cinematography" type="text" placeholder="Cinematography">
        <input name="editing" type="text" placeholder="Editing">
      </div>
      <div class="row">
        <input name="production" type="text" placeholder="Production">
        <input name="composer" type="text" placeholder="Composer/Soundtrack">
        <input name="music" type="text" placeholder="Music">
        <input name="actors" type="text" placeholder="Actors">
      </div>
      <div class="row">
        <input name="festival_year" type="number" placeholder="Festival Year" min="1900" max="2100">
        <input name="section" type="text" placeholder="Section">
        <input name="award" type="text" placeholder="Award">
        <input name="formats" type="text" placeholder="Formats">
        <input name="location" type="text" placeholder="Location">
      </div>
      <div class="row">
        <input name="contact" type="text" placeholder="Contact Person">
        <input name="address" type="text" placeholder="Address">
        <input name="email" type="email" placeholder="E-Mail">
        <input name="formats" type="tel" placeholder="Phone">
        <input name="location" type="url" placeholder="Website">
      </div>
      <button class="toggle-header">
        <img src="<?=url('assets/images/button-dropdown-black.svg')?>">
      </button>
      <input type="submit" value="search">
    </form>
    <div class="table-head">
      <div class="center">
        <span>Original Title</span>
        <span>Genre</span>
        <span>Category</span>
        <span>Duration</span>
        <span>Year</span>
        <span>Country</span>
        <span>Language</span>
      </div>
    </div>
  </div>
</header>
<main>
  <ol class="center">
    <?php
      $results = $films->order('title DESC')
                       ->limit(10)
                       ->all();
      foreach($results as $film): ?>
    <li data-id="<?=$film->key()?>">
      <div>
        <h2>Original Title</h2>
        <em><?=$film->title()?></em>
      </div>
      <div>
        <h2>Genre</h2>
        <em><?=$film->genre()?></em>
      </div>
      <div>
        <h2>Category</h2>
        <em><?=$film->category()?></em>
      </div>
      <div>
        <h2>Duration</h2>
        <em><?=$film->duration()?></em>
      </div>
      <div>
        <h2>Year</h2>
        <em><?=$film->year()?></em>
      </div>
      <div>
        <h2>Country</h2>
        <em><?=$film->country()?></em>
      </div>
      <div>
        <h2>Language</h2>
        <em><?=$film->language()?></em>
      </div>
    </li>
    <?php endforeach ?>
  </ol>
</main>

<!-- <?php snippet('raster') ?> -->

</body>
</html>
