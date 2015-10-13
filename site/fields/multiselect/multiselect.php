<?php

class MultiselectField extends CheckboxesField {

  public $search = true;
  public $yaml   = false;
  public $reload = false;

  static public $assets = array(
    'css' => array(
      'multiselect.css'
     ),
    'js' => array(
      'multiselect.js'
    )
  );

  public function __construct() {
    $this->icon    = 'chevron-down';
  }

  public function input() {
    $value = func_get_arg(0);
    $input = parent::input($value);
    return str_replace('required','', $input);
  }

  public function item($value, $text) {
    $input = $this->input($value);

    $label = new Brick('label');
    $label->addClass('input');
    $label->attr('data-focus', 'true');

    $text = new Brick('span', $this->i18n($text));
    $label->prepend($text);

    $label->prepend($input);


    if($this->readonly) {
      $label->addClass('input-is-readonly');
    }

    return $label;

  }

  public function content() {

    $multiselect = new Brick('div');
    $multiselect->addClass('input input-display');

    if($this->readonly()) $multiselect->addClass('input-is-readonly');
    $multiselect->data(array(
      'field'    => 'multiselect',
      'search'   => $this->search ? 1 : 0,
      'readonly' => ($this->readonly or $this->disabled) ? 1 : 0,
      'reload'   => $this->reload ? 1 : 0
    ));

    $multiselect->append('<div class="placeholder">&nbsp;</div>');

    $content = new Brick('div');
    $content->addClass('field-content input-with-multiselectbox');
    $content->append($multiselect);


    // list with options
    $html  = '<div class="input-list">';
    if ($this->search) {
      $html .= '<input class="multiselectbox-search" placeholder="Type to filter options">';
    }
    $html .= '<ul>';
    foreach($this->options() as $key => $value) {
      $html .= '<li class="input-list-item">';
      $html .= $this->item($key, $value);
      $html .= '</li>';
    }
    $html .= '</ul>';
    $html .= '</div>';

    $content->append($html);


    $content->append($this->icon());

    return $content;

  }

  public function label() {
    $label = parent::label();
    $label->attr('for', '');
    return $label;
  }

  public function result() {
    $result = parent::result();
    if($this->yaml and !is_array($result)) {
      $result = array_filter(explode(', ', $result));
    }

    return empty($result) ? null : $result;
  }

}
