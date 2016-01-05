<?php if(!defined('KIRBY')) exit ?>

title: Homepage
pages: false
files:
  type:
    - image
    - video
  sortable: true
  fields:
    media:
      label: media
      type:  text
      placeholder: max-width:480px
fields:
  title:
    label: Title
    type:  text
  text:
    label: Meta Description
    type:  text
  teaserimage:
    label: Teaser Image
    type:  selector
    types:
      - image
    help:  Image must be 16/9 aspect ratio.
    width: 1/2
  teaservideo:
    label: Teaser Video
    type:  selector
    types:
      - video
    mode:  multiple
    help:  Video must be 16/9 aspect ratio. Different video formats, same video.
    width: 1/2
  info:
    type:  info
    text: >
      Startdate, Enddate and Venue can be changed at *(link: /panel/options text: Site options)*.
