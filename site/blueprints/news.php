<?php if(!defined('KIRBY')) exit ?>

title: News
pages:
  template:
    - news_entry
  num:  date
  sort: flip
files: false
fields:
  title:
    label: Title
    type:  text
  meta_description:
    label: Meta Description
    type:  text
