<?php if(!defined('KIRBY')) exit ?>

title: Sponsors
pages: false
files:
  type:
    - image
fields:
  title:
    label: Title
    type:  text
  meta_description:
    label: Meta Description
    type:  text
  logos:
    label: Logos
    type:  structure
    entry: >
      {{logo}}<br>
      {{url}}
    fields:
      logo:
        label: Logo
        type:  selector
        mode:  single
        required: true
        types:
          - image
      url:
        label: URL
        type:  url
