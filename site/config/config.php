<?php

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('cache',true);
c::set('cache.ignore', array(
  'news',
  'news/*',
  'film-archive',
  'film-archive/*'
));


c::set('routes', array(
  array(
    'pattern' => 'tickets',
    'action'  => function() {
      go('festival/tickets');
    }
  ),
));


c::set('languages', array(
  array(
    'code'    => 'de',
    'name'    => 'Deutsch',
    'default' => true,
    'locale'  => 'de_DE',
    'url'     => '/',
  ),
  array(
    'code'    => 'en',
    'name'    => 'English',
    'locale'  => 'en_US',
    'url'     => '/en',
  )
  ,
));


c::set('timezone','CET');
