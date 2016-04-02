<!DOCTYPE html>
<html lang="<?=$site->language()->code()?>">
<?php snippet('head') ?>
<body class="timetable invert">
<?php snippet('mainnav') ?>

<?php
global $page;
function returnDay($day) {
  $day = strtotime($day);
  $html = '<div class="day">
    <header>
      <h1>Di <span class="date">' . date('d', $day) . '<br>' . date('m', $day) .'</span></h1>
    </header>';
  $events = page()->events()->toStructure()->filter(function($field) use ($day) {
    return $field->date('d.m.y', 'datetime') == date('d.m.y', $day);
  });
  foreach($events as $event) {
    $html .= returnEvent($event);
  };
  $html .= '</div>';
  return $html;
}
function returnEvent($event) {
  $element;
  if ($event->link()->isEmpty()) {
    $element = new Brick('div');
  } else {
    $element = new Brick('a');
    $page = page($event->link());
    $element->attr('href', $page->url());
    if ($page->subtitle()) {
      $element->attr('title', $page->title() . ' – ' . $page->subtitle());
    }
  }
  $element->addClass('event');
  if ($event->black()->bool()) {
    $element->addClass('black');
  }
  if ($event->span()->bool()) {
    $element->addClass('span');
  }
  $element->data('time', $event->date('H:i', 'datetime'));
  $element->data('duration', $event->duration());
  $element->html($event->name()->kt());
  return $element->toString();
}
?>

<div class="center">
  <main>
    <div class="table">
      <div class="hours">
      </div>
      <?= returnDay('2016-04-19') ?>
      <?= returnDay('2016-04-20') ?>
      <?= returnDay('2016-04-21') ?>
      <?= returnDay('2016-04-22') ?>
      <?= returnDay('2016-04-23') ?>
      <?= returnDay('2016-04-24') ?>
    </div>
  </main>
</div>


<?php snippet('mainfooter') ?>
</body>
</html>
