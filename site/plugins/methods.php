<?php

field::$methods['translateCountry'] = function($field, $language) {
  $translate = yaml('
    Germany: Deutschland
    France: Frankreich
    Spain: Spanien
    United Kingdom: Vereinigtes Königreich
    Great Britain: Großbritannien
    Switzerland: Schweiz
    Austria: Österreich
    Canada: Kanada
    The Netherlands: Niederlande
    Belgium: Belgien
    Kosovo: Kosovo
    Romania: Romänien
    Brasil: Brasilien
    Ireland: Irland
    Northern Ireland: Nordirland
    Norway: Norwegen
    Italy: Italien
    Armenia: Armenien
    Scotland: Schottland
    Denmark: Dänemark
    Luxembourg: Luxemburg
    Indonesia: Indonesien
    Turkey: Türkei
    Russia: Russland
    Croatia: Kroatien
    Poland: Polen
    Israel: Israel
    Iceland: Island
    Mexico: Mexico
    Argentina: Argentinien
    Chile: Chile
    Russia: Russland
    Sweden: Schweden
  ');
  if ($language->code() === 'de') {
    $field = strtr($field->value, $translate);
  }
  return $field;
};
