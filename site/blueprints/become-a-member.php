<?php if(!defined('KIRBY')) exit ?>

title: Become A Member
pages: false
files: false
fields:
  title:
    label: Title
    type:  text
  meta_description:
    label: Meta Description
    type:  text
  h1:
    label: H1
    type:  text
    required: true
    width: 1/2
  h2:
    label: H2
    type:  text
    required: true
    width: 1/2
  infobox:
    label: Infobox
    type:  textarea
    buttons:
      - link
      - email
  text:
    label: Text
    type:  textarea
    required: true
    buttons:
      - link
      - email
