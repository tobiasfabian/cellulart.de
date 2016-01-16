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
  'film-archiv'
));


c::set('routes', array(
  array(
    'pattern' => 'site/languages',
    'action'  => function() {
      go('news');
    }
  ),
  array(
    'pattern' => 'news/festival',
    'action'  => function() {
      go('news');
    }
  ),
  array(
    'pattern' => 'index_en.html',
    'action'  => function() {
      go('en');
    }
  ),
  array(
    'pattern' => 'contact',
    'action'  => function() {
      go('meta/kontakt');
    }
  ),
  array(
    'pattern' => 'downloads/programmheft_cellulart_2008.pdf',
    'action'  => function() {
      go('content/5-archiv/8-2008/cellulart_programmheft_2008.pdf');
    }
  ),
  array(
    'pattern' => 'downloads/programmheft_cellulart_2007.pdf',
    'action'  => function() {
      go('content/5-archiv/9-2007/cellulart_programmheft_2007.pdf');
    }
  ),
  array(
    'pattern' => 'en/contact/press',
    'action'  => function() {
      go('en/meta/presse');
    }
  ),
  array(
    'pattern' => 'archiv/2010/index.html',
    'action'  => function() {
      go('archiv/2010');
    }
  )
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
