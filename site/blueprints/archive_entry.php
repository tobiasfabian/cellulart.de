<?php if(!defined('KIRBY')) exit ?>

title: Archive Entry
pages:
  template:
    - default
    - page
    - competition
    - film_award
    - jury
files:
  sortable: true
  fields:
    caption:
      label: Caption
      type:  text
fields:
  title:
    label: Title
    type:  text
  meta_description:
    label: Meta Description
    type:  text
  awards:
    label: Awards
    type:  structure
    entry: >
      {{award}}: {{film}}
    fields:
      award:
        label: Award
        type:  textarea
        buttons: false
        required: true
      film:
        label: Film
        type:  select
        required: true
        options: children
  text:
    label: Text
    type:  textarea
    buttons:
      - link
      - email
  headline-gallery:
    label: Gallery
    type:  headline
  gallery-images:
    label: Images
    type:  selector
    mode:  multiple
    autoselect: all
    types:
      - image
  headline-downloads:
    label: Downloads
    type:  headline
  downloads:
    label: Downloads
    type:  selector
    mode:  multiple
    types:
      - document
      - archive
      - unknown
      - video
