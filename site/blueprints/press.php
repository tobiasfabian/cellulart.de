<?php if(!defined('KIRBY')) exit ?>

title: Press
pages: false
files:
  fields:
    text:
      label: Title
      type:  text
  sortable: true
fields:
  title:
    label: Title
    type:  text
  meta_description:
    label: Meta Description
    type:  text
  text:
    label: Text
    type:  textarea
  downloads:
    label: Downloads
    type:  selector
