<?php if(time() > strtotime('2016-04-20') && time() < strtotime('2016-04-25')) : ?>
<?php
$timetable = page('festival/timetable');
$day = strtotime(date('Y-m-d'));
$events = $timetable->events()->toStructure()->filter(function($field) use ($day) {
  return $field->date('d.m.y', 'datetime') == date('d.m.y', $day);
});
?>
<section class="mini_timetable" aria-labledby="mini_timetable_title">
  <h1 id="mini_timetable_title">Heute im Volksbad Jena</h1>
  <a href="<?= $timetable->url() ?>" class="timetable_link button small"><?= $timetable->title() ?></a>
  <ul>
    <?php
      foreach ($events as $event):
        $event_page = page($event->link());
        $event_title = '<span>' . $event_page->title() . '</span>';
        if (!$event_page->subtitle()->isEmpty()) {
          $event_title .= '<br>' . '<span>' . $event_page->subtitle() . '</span>';
        }
    ?>
    <li>
      <a href="<?= $event_page->url() ?>">
        <span class="info">
          <time datetime="<?= $event->date('c', 'datetime') ?>"><?= $event->date('H:i', 'datetime') ?> <?= l::get('o’clock') ?></time><?= !$event->room()->isEmpty() ? ', ' . $event->room()  : null ?>
        </span>
        <h2><?= $event_title ?></h2>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</section>
<?php endif; ?>
