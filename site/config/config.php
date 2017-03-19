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
    'locale'  => array(
      LC_COLLATE  => 'de_DE.utf8',
      LC_MONETARY => 'de_DE.utf8',
      LC_NUMERIC  => 'de_DE.utf8',
      LC_TIME     => 'de_DE.utf8',
      LC_MESSAGES => 'de_DE.utf8',
      LC_CTYPE    => 'de_DE.utf8'
    ),
  ),
  array(
    'code'    => 'en',
    'name'    => 'English',
    'locale'  => 'en_US',
    'url'     => '/en',
    'locale'  => array(
      LC_COLLATE  => 'en_US.utf8',
      LC_MONETARY => 'en_US.utf8',
      LC_NUMERIC  => 'en_US.utf8',
      LC_TIME     => 'en_US.utf8',
      LC_MESSAGES => 'en_US.utf8',
      LC_CTYPE    => 'en_US.utf8'
    ),
  )
  ,
));


c::set('timezone','CET');
