<?php if(!defined('KIRBY')) exit ?>

title: Filmblock
pages:
  template:
    - film
files:
  type:
    - image
    - video
fields:
  title:
    label: Title
    type:  text
    width: 1/2
    placeholder:
      de: Wettbewerb 1
      de: Competition 1
  subtitle:
    label: Subtitle
    type:  text
    width: 1/2
    placeholder:
      de: Schöne neue Welt?
      en: Schöne neue Welt?
  meta_description:
    label: Meta Description
    type:  text
  text:
    label: Text
    type:  textarea
    buttons: false
  dates:
    label: Dates
    type: structure
    entry: >
      {{date}} {{time}}
    fields:
      date:
        label: date
        type:  date
        width: 1/2
        required: true
      time:
        label: time
        type:  time
        interval: 15
        width: 1/2
        required: true
  blockimage:
    label: Block Image
    type:  selector
    mode:  single
    types:
      - image
    width: 1/2
  blockvideo:
    label: Block Video
    type:  selector
    mode:  single
    types:
      - video
    width: 1/2
  bockvideo-vimeo:
    label: Block Video Vimeo URL
    type:  url
    validate: url
  venueHeadline:
    label: Venue
    type: headline
  venue:
    label: Venue Name
    type:  text
  street:
    label: Street
    type:  text
    width: 1/3
  zip:
    label: ZIP
    type:  text
    default: 07743
    width: 1/3
  city:
    label: City
    type:  text
    default: Jena
    width: 1/3