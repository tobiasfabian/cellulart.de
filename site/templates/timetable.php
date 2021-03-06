<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="timetable invert">
<?php snippet('mainnav') ?>

<?php
function returnDay($day, $faulloch = false) {
  $day = strtotime($day);
  $html = '<div class="day">
    <header>
      <h1><span>' . strftime('%a', $day) . '</span><time datetime="' . date('c', $day) . '">' . date('d', $day) . '<br>' . date('m', $day) .'</time></h1>';
  if ($faulloch) {
    $html .= '<h2 class="black span">Faulloch<br>Johannistor</h2>';
  } else {
    $html .= '<h2>Großer Saal</h2>
    <h2 class="black">Kleiner Saal</h2>';
  }
  $html .= '</header>';
  $events = page()->events()->toStructure()->filter(function($field) use ($day) {
    return $field->date('d.m.y', 'datetime') == date('d.m.y', $day);
  });
  foreach($events as $event) {
    $html .= returnEvent($event, $faulloch);
  };
  $html .= '</div>';
  return $html;
}
function returnEvent($event, $faulloch) {
  $element;
  if ($event->link()->isEmpty()) {
    $element = new Brick('div');
    $element->append('<meta itemprop="name" content="' . $event->name() . '">');
  } else {
    $element = new Brick('a');
    $link = $event->link();
    $page = page($link);
    if ($page) {
      $title = $page->title() . ' – ' . $page->subtitle();
      $element->attr('href', $page->url());
      $element->append('<meta itemprop="name" content="' . $title . '">');
      if ($page->subtitle()) {
        $element->attr('title', $title);
      }
    } else {
      echo 'Error with link: ' , $link;
    }
  }
  $element->attr('itemscope', ' ');
  $element->attr('itemtype', 'http://schema.org/Event');
  $element->append('<meta itemprop="startDate" content="' . $event->date('c', 'datetime') . '">');
  $element->addClass('event');
  if ($event->black()->bool()) {
    $element->addClass('black');
  }
  if ($event->span()->bool()) {
    $element->addClass('span');
  }
  $element->data('time', $event->date('H:i', 'datetime'));
  $element->data('duration', $event->duration());
  $element->append($event->name()->kt());
  $element->append('<meta itemprop="organizer" content="' . site()->title() . '">');
  if (!page()->venue()->isEmpty() and !$faulloch) {
    $elementLocation = new Brick('span');
    $elementLocation->attr('itemprop', 'location');
    $elementLocation->attr('itemscope', ' ');
    $elementLocation->attr('itemtype', 'http://schema.org/Place');
    $elementLocation->html('<meta itemprop="name" content="' . page()->venue() . '">');
    if (!page()->street()->isEmpty() AND !page()->zip()->isEmpty() AND !page()->city()->isEmpty()) {
      $elementAddress = new Brick('span');
      $elementAddress->attr('itemprop', 'address');
      $elementAddress->attr('itemscope', ' ');
      $elementAddress->attr('itemtype', 'http://schema.org/PostalAddress');
      $elementAddress->html('<meta itemprop="streetAddress" content="' . page()->street() . '">');
      $elementAddress->append('<meta itemprop="postalCode" content="' . page()->zip() . '">');
      $elementAddress->append('<meta itemprop="addressLocality" content="' . page()->city() . '">');
      $elementLocation->append($elementAddress);
    }
    $element->append($elementLocation);
  }
  return $element->toString();
}
?>

<div class="center">
  <main>
    <div class="table">
      <aside class="hours">
        <span>17:00</span>
        <span class="black">17:15</span>
        <span>18:00</span>
        <span class="black">18:15</span>
        <span>19:00</span>
        <span class="black">19:15</span>
        <span>20:00</span>
        <span class="black">20:15</span>
        <span>21:00</span>
        <span class="black">21:15</span>
        <span>22:00</span>
        <span class="black">22:15</span>
        <span>23:00</span>
        <span>00:00</span>
      </aside>
      <div class="days">
        <?= returnDay('2016-04-19', $faulloch = true) ?>
        <?= returnDay('2016-04-20') ?>
        <?= returnDay('2016-04-21') ?>
        <?= returnDay('2016-04-22') ?>
        <?= returnDay('2016-04-23') ?>
        <?= returnDay('2016-04-24') ?>
      </div>
    </div>
    <footer>
      <?php if(!$page->footer_1()->empty()): ?>
      <div class="footer_1">
        <?= $page->footer_1()->kt() ?>
      </div>
      <?php endif ?>
      <?php if(!$page->footer_2()->empty()): ?>
      <div class="footer_2">
        <?= $page->footer_2()->kt() ?>
      </div>
      <?php endif ?>
    </footer>
  </main>
</div>


<?php snippet('mainfooter') ?>
</body>
</html>
