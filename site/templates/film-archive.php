<?php

function arrayFromJsonFile($file,$lang = 'en') {
  $root = kirby()->roots()->content().DS.'film-archive'.DS;
  if ($file === 'formats') {
    $array = str::parse(f::read($root.$file.'.json'),'json');
  } else {
    $array = str::parse(f::read($root.$file.'.'.$lang.'.json'),'json');
  }
  return $array;
}

function outputArray($array1,$array2) {
  if ($array1) {
    $output = [];
    foreach(explode(', ', $array1) as $genre) {
      array_push($output, $array2[$genre]);
    }
    return implode(', ',$output);
  } else {
    return '–';
  }
}


// Database
$database = new Db();
$films = $database->films;


// array from json
$genres = arrayFromJsonFile('genres');
$categories = arrayFromJsonFile('categories');
$countries = arrayFromJsonFile('countries');
$languages = arrayFromJsonFile('languages');
$sections = arrayFromJsonFile('sections');
$awards = arrayFromJsonFile('awards');
$formats = arrayFromJsonFile('formats');
$tags = [];
foreach($films->select(array('tags')) ->order('tags DESC')->all() as $tag) {
  $_tags = $tag->tags;
  foreach(explode(',',$_tags) as $tag) {
    array_push($tags,$tag);
  }
}
$tags = array_filter(array_unique($tags));


// Filter
if (get('title')) {
  $films = $films->where('title','LIKE','%'.get('title').'%')
                 ->orWhere('title_de','LIKE','%'.get('title').'%')
                 ->orWhere('title_en','LIKE','%'.get('title').'%');
}
if (get('genre')) {
  $films = $films->where('genre','LIKE','%'.get('genre').'%');
}
if (get('category')) {
  $films = $films->where('category','LIKE','%'.get('category').'%');
}
if (get('duration')) {
  $films = $films->where('duration','>','0');
  if (get('duration') == '0-5') {
    $duration = 5*60+59;
    $films = $films->where('duration', '<=', $duration);
  } else if (get('duration') == '5-10') {
    $duration1 = 5*60;
    $duration2 = 10*60+59;
    $films = $films->where('duration', '>=', $duration1)->where('duration', '<=', $duration2);
  } else if (get('duration') == '10-15') {
    $duration1 = 10*60;
    $duration2 = 15*60+59;
    $films = $films->where('duration', '>=', $duration1)->where('duration', '<=', $duration2);
  } else if (get('duration') == '15-30') {
    $duration1 = 15*60;
    $duration2 = 30*60+50;
    $films = $films->where('duration', '>=', $duration1)->where('duration', '<=', $duration2);
  } else if (get('duration') == '30-') {
    $duration = 30*60;
    $films = $films->where('duration', '>=', $duration);
  }
}
if (get('year')) {
  $films = $films->where('year','LIKE','%'.get('year').'%');
}
if (get('country')) {
  $films = $films->where('country','LIKE','%'.get('country').'%');
}
if (get('language')) {
  $films = $films->where('language','LIKE','%'.get('language').'%');
}
if (get('title_de')) {
  $films = $films->where('title_de','LIKE','%'.get('title_de').'%');
}
if (get('title_en')) {
  $films = $films->where('title_de','LIKE','%'.get('title_en').'%');
}
if (get('tag')) {
  $films = $films->where('tags','LIKE','%'.get('tag').'%');
}
if (get('subtitle')) {
  $films = $films->where('subtitles','LIKE','%'.get('subtitle').'%');
}
if (get('synopsis_de')) {
  $films = $films->where('synopsis_de','LIKE','%'.get('synopsis_de').'%');
}
if (get('synopsis_en')) {
  $films = $films->where('synopsis_en','LIKE','%'.get('synopsis_en').'%');
}
if (get('direction')) {
  $films = $films->where('direction','LIKE','%'.get('direction').'%');
}
if (get('screenplay')) {
  $films = $films->where('screenplay','LIKE','%'.get('screenplay').'%');
}
if (get('cinematography')) {
  $films = $films->where('cinematography','LIKE','%'.get('cinematography').'%');
}
if (get('editing')) {
  $films = $films->where('editing','LIKE','%'.get('editing').'%');
}
if (get('production')) {
  $films = $films->where('production','LIKE','%'.get('production').'%');
}
if (get('composer')) {
  $films = $films->where('composer','LIKE','%'.get('composer').'%');
}
if (get('music')) {
  $films = $films->where('music','LIKE','%'.get('music').'%');
}
if (get('actors')) {
  $films = $films->where('actors','LIKE','%'.get('actors').'%');
}
if (get('festival_year')) {
  $films = $films->where('festival_year','LIKE','%'.get('festival_year').'%');
}
if (get('section')) {
  $films = $films->where('section','LIKE','%'.get('section').'%');
}
if (get('award')) {
  $films = $films->where('awards','LIKE','%'.get('award').'%');
}
if (get('format')) {
  $films = $films->where('formats','LIKE','%'.get('format').'%');
}
if (get('location')) {
  $films = $films->where('location','LIKE','%'.get('location').'%');
}
if (get('contact')) {
  $films = $films->where('contact','LIKE','%'.get('contact').'%');
}
if (get('address')) {
  $films = $films->where('address','LIKE','%'.get('address').'%');
}
if (get('email')) {
  $films = $films->where('email','LIKE','%'.get('email').'%');
}
if (get('phone')) {
  $films = $films->where('phone','LIKE','%'.get('phone').'%');
}
if (get('website')) {
  $films = $films->where('website','LIKE','%'.get('website').'%');
}


// Results
$results = $films->order('title ASC')
                 ->all();

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
  <div class="center">
    <h1><a href="<?=$page->url()?>"><?=$site->title()->html().' '.strtolower($page->title()->html())?></a></h1>
    <a href="<?=$site->url()?>" class="back">cellulart.de</a>
    <form>
      <div class="row">
        <input name="title" type="text" placeholder="Title" value="<?=get('title')?>">
        <select name="genre">
          <option value="">genre</option>
          <?php foreach($genres as $key => $value): ?>
          <option value="<?=$key?>"<?=get('genre')===$key?' selected':null?>><?=$value?></option>
          <?php endforeach; ?>
        </select>
        <select name="category">
          <option value="">category</option>
          <?php foreach($categories as $key => $value): ?>
          <option value="<?=$key?>"<?=get('category')===$key?' selected':null?>><?=$value?></option>
          <?php endforeach; ?>
        </select>
        <select name="duration">
          <option value="">duration</option>
          <option value="0-5"<?=get('duration')==='0-5'?' selected':null?>>&lt; 5 min</option>
          <option value="5-10"<?=get('duration')==='5-10'?' selected':null?>>5-10 min</option>
          <option value="10-15"<?=get('duration')==='10-15'?' selected':null?>>10-15 min</option>
          <option value="15-30"<?=get('duration')==='15-30'?' selected':null?>>15-30 min</option>
          <option value="30-"<?=get('duration')==='30-'?' selected':null?>>&gt; 30 min</option>
        </select>
        <input name="year" type="number" placeholder="Year" min="1900" max="2100" value="<?=get('year')?>">
        <select name="country">
          <option value="">country</option>
          <?php foreach($countries as $key => $value): ?>
          <option value="<?=$key?>"<?=get('country')===$key?' selected':null?>><?=$value?></option>
          <?php endforeach; ?>
        </select>
        <select name="language">
          <option value="">language</option>
          <?php foreach($languages as $key => $value): ?>
            <option value="<?=$key?>"<?=get('language')===$key?' selected':null?>><?=$value?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="row">
        <input name="title_de" type="text" placeholder="German Title" value="<?=get('title_de')?>">
        <input name="title_en" type="text" placeholder="English Title" value="<?=get('title_en')?>">
        <select name="tag">
          <option value="">tag</option>
          <?php foreach($tags as $value): ?>
          <option value="<?=$value?>"<?=get('tag')===$value?' selected':null?>><?=$value?></option>
          <?php endforeach; ?>
        </select>
        <select name="subtitle">
          <option value="">subtitle</option>
          <?php foreach($languages as $key => $value): ?>
          <option value="<?=$key?>"<?=get('subtitle')===$key?' selected':null?>><?=$value?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="row">
        <input name="snyopsis_de" type="text" placeholder="Snyopsis (de)" value="<?=get('snyopsis_de')?>">
        <input name="snyopsis_en" type="text" placeholder="Snyopsis (en)" value="<?=get('snyopsis_en')?>">
      </div>
      <div class="row">
        <input name="direction" type="text" placeholder="Direction" value="<?=get('direction')?>">
        <input name="screenplay" type="text" placeholder="Screenplay" value="<?=get('screenplay')?>">
        <input name="cinematography" type="text" placeholder="Cinematography" value="<?=get('cinematography')?>">
        <input name="editing" type="text" placeholder="Editing" value="<?=get('editing')?>">
      </div>
      <div class="row">
        <input name="production" type="text" placeholder="Production" value="<?=get('production')?>">
        <input name="composer" type="text" placeholder="Composer/Soundtrack" value="<?=get('composer')?>">
        <input name="music" type="text" placeholder="Music" value="<?=get('music')?>">
        <input name="actors" type="text" placeholder="Actors" value="<?=get('actors')?>">
      </div>
      <div class="row">
        <input name="festival_year" type="number" placeholder="Festival Year" min="2000" max="<?=date('Y')+5?>" value="<?=get('festival_year')?>">
        <input name="section" type="text" placeholder="Section" value="<?=get('section')?>">
        <select name="award">
          <option value="">award</option>
          <?php foreach($awards as $key => $value): ?>
          <option value="<?=$key?>"<?=get('award')===$key?' selected':null?>><?=$value?></option>
          <?php endforeach; ?>
        </select>
        <select name="format">
          <option value="">format</option>
          <?php foreach($formats as $key => $value): ?>
          <option value="<?=$key?>"<?=get('format')===$key?' selected':null?>><?=$value?></option>
          <?php endforeach; ?>
        </select>
        <input name="location" type="text" placeholder="Location" value="<?=get('location')?>">
      </div>
      <div class="row">
        <input name="contact" type="text" placeholder="Contact Person" value="<?=get('contact')?>">
        <input name="address" type="text" placeholder="Address" value="<?=get('address')?>">
        <input name="email" type="email" placeholder="E-Mail" value="<?=get('email')?>">
        <input name="phone" type="tel" placeholder="Phone" value="<?=get('phone')?>">
        <input name="website" type="url" placeholder="Website" value="<?=get('website')?>">
      </div>
      <input type="submit" value="search">
      <button class="toggle-header">
        <img src="<?=url('assets/images/button-dropdown-black.svg')?>">
      </button>
      <a href="<?=$page->url()?>" class="clear_filter">clear filter</a>
    </form>
  </div>
  <div class="table-head">
    <?php if ($results->count() > 0): ?>
    <div class="center">
      <span class="title">Original Title</span>
      <span class="genre">Genre</span>
      <span class="category">Category</span>
      <span class="duration">Duration</span>
      <span class="year">Year</span>
      <span class="country">Country</span>
      <span class="language">Language</span>
      <div class="clear"></div>
    </div>
    <?php endif ?>
  </div>
</header>
<main class="center">
  <?php if ($results->count() > 0): ?>
  <ol id="films">
    <?php
      foreach($results as $film):
        if ($film->duration()) {
          $duration = $film->duration();
          $minutes = floor($duration/60);
          $seconds = $duration-$minutes*60;
          $duration = $minutes.':'.sprintf("%02d",$seconds);
        } else {
          $duration = '–';
        }
    ?>
    <li data-id="<?=$film->key()?>" data-uri="<?=$film->uri()?>">
      <div class="title">
        <h2>Original Title</h2>
        <em><?=$film->title()?$film->title():'–'?></em>
      </div>
      <div class="genre">
        <h2>Genre</h2>
        <em><?=outputArray($film->genre(),$genres)?></em>
      </div>
      <div class="category">
        <h2>Category</h2>
        <em><?=outputArray($film->category(),$categories)?></em>
      </div>
      <div class="duration">
        <h2>Duration</h2>
        <em data-duration="<?=$film->duration()?>"><?=$duration?></em>
      </div>
      <div class="year">
        <h2>Year</h2>
        <em><?=$film->year()?$film->year():'–'?></em>
      </div>
      <div class="country">
        <h2>Country</h2>
        <em><?=outputArray($film->country(),$countries)?></em>
      </div>
      <div class="language">
        <h2>Language</h2>
        <em><?=outputArray($film->language(),$languages)?></em>
      </div>
      <a class="edit" href="<?=url('panel/pages/'.$page->uri().'/'.$film->uri().'/edit')?>">
        <img src="<?=url('assets/images/button-edit.svg')?>" alt="edit">
      </a>
      <div class="clear"></div>
      <div class="title_de">
        <h2>German Title</h2>
        <em><?=$film->title_de()?$film->title_de():'–'?></em>
      </div>
      <div class="title_en">
        <h2>English Title</h2>
        <em><?=$film->title_en()?$film->title_en():'–'?></em>
      </div>
      <div class="tags">
        <h2>Tags</h2>
        <em><?=$film->tags()?$film->tags():'–'?></em>
      </div>
      <div class="subtitles">
        <h2>Subtitle(s)</h2>
        <em><?=outputArray($film->subtitles(),$languages)?></em>
      </div>
      <div class="clear"></div>
      <div class="direction">
        <h2>Direction</h2>
        <em><?=$film->direction()?$film->direction():'–'?></em>
      </div>
      <div class="screenplay">
        <h2>Sreenplay</h2>
        <em><?=$film->screenplay()?$film->screenplay():'–'?></em>
      </div>
      <div class="cinematography">
        <h2>Cinematography</h2>
        <em><?=$film->cinematography()?$film->cinematography():'–'?></em>
      </div>
      <div class="editing">
        <h2>Editing</h2>
        <em><?=$film->editing()?$film->editing():'–'?></em>
      </div>
      <div class="production">
        <h2>Production</h2>
        <em><?=$film->production()?$film->production():'–'?></em>
      </div>
      <div class="composer">
        <h2>Composer/Soundtrack</h2>
        <em><?=$film->composer()?$film->composer():'–'?></em>
      </div>
      <div class="music">
        <h2>Music</h2>
        <em><?=$film->music()?$film->music():'–'?></em>
      </div>
      <div class="actors">
        <h2>Actors</h2>
        <em><?=$film->actors()?$film->actors():'–'?></em>
      </div>
      <div class="clear"></div>
      <div class="festival_year">
        <h2>Festival Year</h2>
        <em><?=$film->festival_year()?$film->festival_year():'–'?></em>
      </div>
      <div class="section">
        <h2>Section</h2>
        <em><?=outputArray($film->section(),$sections)?></em>
      </div>
      <div class="awards">
        <h2>Awards</h2>
        <em><?=outputArray($film->awards(),$awards)?></em>
      </div>
      <div class="formats">
        <h2>Formats</h2>
        <em><?=outputArray($film->formats(),$formats)?></em>
      </div>
      <div class="location">
        <h2>Location</h2>
        <em><?=$film->location()?$film->location():'–'?></em>
      </div>
      <div class="clear"></div>
      <div class="synopsis">
        <h2>Synopsis (de)</h2>
        <em><?=$film->synopsis_de()?$film->synopsis_de():'–'?></em>
      </div>
      <div class="synopsis">
        <h2>Synopsis (en)</h2>
        <em><?=$film->synopsis_en()?$film->synopsis_en():'–'?></em>
      </div>
      <div class="clear"></div>
      <div class="contact">
        <h2>Contact Person</h2>
        <em><?=$film->contact()?$film->contact():'–'?></em>
      </div>
      <div class="address">
        <h2>Address</h2>
        <em><?=$film->address()?$film->address():'–'?></em>
      </div>
      <div class="email">
        <h2>E-Mail</h2>
        <em><?=$film->email()?'<a href="mailto:'.$film->email().'">'.$film->email().'</a>':'–'?></em>
      </div>
      <div class="phone">
        <h2>Phone</h2>
        <em><?=$film->phone()?$film->phone():'–'?></em>
      </div>
      <div class="website">
        <h2>Website</h2>
        <?php $website = str_replace('http://','',$film->website()); ?>
        <em><?=$film->website()?'<a href="'.$film->website().'">'.$website.'</a>':'–'?></em>
      </div>
      <div class="clear"></div>
    </li>
    <?php endforeach ?>
  </ol>
  <div class="info">
    <p><?=$results->count()?> <?=$results->count()==1?'film':'films'?> found</p>
  </div>
  <?php
    else:
      $errors = [];
      array_push($errors,'First principles, Clarice. Simplicity. Read Marcus Aurelius. Of each particular thing ask: what is it in itself? What is its nature? What does he do, this man you seek?');
      array_push($errors,'You talkin’ to me?');
      array_push($errors,'Elementary, my dear Watson. Purely elementary.');
      array_push($errors,'Frankly, my dear. I don’t give a damn.');
      array_push($errors,'There’s no place like home.');
      array_push($errors,'You hear me talkin’, hillbilly boy?.');
      $error = a::first(a::shuffle($errors));

  ?>
  <div class="info">
    <p><?=$results->count()?> <?=$results->count()==1?'film':'films'?> found. <a href="<?=$page->url()?>">clear filter</a></p>
    <p>
      <?=$error?>
    </p>
  </div>
  <?php endif; ?>
</main>

<!-- <?php snippet('raster') ?> -->

</body>
</html>
