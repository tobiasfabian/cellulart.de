<?php
header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename="cal.ics"');
?>
BEGIN:VCALENDAR
VERSION:2.0
PRODID:<?=$site->text?> Event
METHOD:PUBLISH
BEGIN:VEVENT
UID:<?=$page->uid()?>@<?=$site->url()?>

ORGANIZER;CN="<?=$site->title()?>":MAILTO:<?=$site->email()?>

LOCATION:<?=$page->venue()?>\n<?=$page->street()?>\n<?=$page->zip()?> <?=$page->city()?>\, Germany

URL:<?=$pages->find('news')->url()?>

SUMMARY:<?=$page->title()?>

DESCRIPTION:<?=$page->text()?>
CLASS:PUBLIC
DTSTART:<?=date('Ymd\THis',strtotime($page->startdate()))?>
<?php if(!$page->enddate()->isEmpty()): ?>

DTEND:<?=date('Ymd\THis',strtotime($page->enddate()))?>

<?php endif ?>
END:VEVENT
END:VCALENDAR
