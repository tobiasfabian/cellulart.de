<?php
kirbytext::$tags['vimeo'] = array(
  'attr' => array(
    'caption'
  ),
  'html' => function($tag) {
    $caption = $tag->attr('caption');
    $id = $tag->attr('vimeo');
    if(preg_match('!vimeo.com\/([0-9]+)!i', $tag->attr('vimeo'), $array)) {
      $id = $array[1];
    } else {
      $id = null;
    }
    if(!empty($caption)) {
      $figcaption = '<figcaption>' . escape::html($caption) . '</figcaption>';
    } else {
      $figcaption = null;
    }
    $attr = array_merge(array(
      'src'                   => '//player.vimeo.com/video/' . $id . '?color=EA564B&portrait=0&byline=0',
      'frameborder'           => '0',
      'webkitAllowFullScreen' => 'true',
      'mozAllowFullScreen'    => 'true',
      'allowFullScreen'       => 'true'
    ));
    return '<figure class="' . $tag->attr('class', kirby()->option('kirbytext.video.class', 'video')) . '">' . html::tag('iframe', '', $attr) . $figcaption . '</figure>';
  }
);
