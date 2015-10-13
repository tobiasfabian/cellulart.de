<?php if(!defined('KIRBY')) exit ?>

title: Contact
pages: false
files: false
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
    buttons:
      - link
      - email
