<?php if(!defined('KIRBY')) exit ?>

title: news entry
pages: false
files:
  fields:
    caption:
      label: Caption
      type:  text
fields:
  title:
    label: Title
    type:  text
    width: 3/4
  date:
    label: Date
    type:  date
    format: DD.MM.YYYY
    default: today
    required: true
    width: 1/4
  text:
    label: Text (short)
    type:  textarea
    required: true
    buttons:
      - link
      - email
  text_continue:
    label: Text (continue)
    type:  textarea
    buttons:
      - link
      - email
