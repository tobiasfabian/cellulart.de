<?php if(!defined('KIRBY')) exit ?>

title: Homepage
pages: false
files:
  type:
    - image
    - video
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
    help:  Video must be 16/9 aspect ratio.
    width: 1/2
  info:
    type:  info
    text: >
      Startdate, Enddate and Venue can be changed at *(link: /panel/options text: Site options)*.
