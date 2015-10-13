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
DTSTART:<?=$page->date('Ymd')?>T<?=str_replace(':','',$page->time())?>00
<?php if(!$page->enddate()->isEmpty() AND !$page->endtime()->isEmpty()): ?>
DTEND:<?=date('Ymd',strtotime($page->enddate()))?>T<?=str_replace(':','',$page->endtime())?>00
<?php endif ?>
END:VEVENT
END:VCALENDAR
