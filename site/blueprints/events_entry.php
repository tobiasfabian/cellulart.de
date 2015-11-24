<?php if(!defined('KIRBY')) exit ?>

title: Events Entry
pages: false
files: false
preview: parent
fields:
  title:
    label: Title
    type:  text
  fb-link:
    label: FB Link
    type:  url
  startdate:
    label: Start Date
    type:  datetime
    required: true
    time:
      interval: 15
  enddate:
    label: End Date
    type:  datetime
    time:
      interval: 15
  text:
    label: Text (short)
    type:  textarea
    buttons:
      - link
  venueHeadline:
    label: Venue
    type: headline
  venue:
    label: Venue Name
    type:  text
  venue-link:
    label: Vanue Link
    type:  url
    validate: url
  street:
    label: Street
    type:  text
    width: 1/3
  zip:
    label: ZIP
    type:  text
    default: 07743
    width: 1/3
    validate: num
  city:
    label: City
    type:  text
    default: Jena
    width: 1/3
