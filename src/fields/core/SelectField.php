<?php
/**
 * Created by PhpStorm.
 * User: Wes Gilleland
 * Date: 1/20/2016
 * Time: 2:25 PM
 */

namespace WTForms\Fields\Core;

use WTForms\Form;
use WTForms\ValueError;
use WTForms\Widgets;
use WTForms\Widgets\Core\Option;
use WTForms\Widgets\Core\Select;

class SelectField extends SelectFieldBase
{
  /**
   * @var Option
   */
  public $option_widget;

  /**
   * @var array
   */
  public $choices = [];

  /**
   * // TODO: Investigate whether this var needs to be moved to super class... probably
   * @var array
   */
  public $data = [];

  public function __construct($label = "", array $validators = [], array $choices = [], array $kwargs = [])
  {
    parent::__construct($label, $validators, null, $kwargs);
    $this->option_widget = new Select();
    $this->choices = $choices;
  }

  public function iter_choices()
  {
    $t = [];
    foreach ($this->choices as $value => $label) {
      $t[] = [$value, $label, $value == $this->data];
    }
    return $t;
  }

  public function process_data($value)
  {
    $this->data = $value;
  }

  public function process_formdata(array $valuelist = [])
  {
    if (count($valuelist) != 0) {
      $this->data = $valuelist[0];
    }
  }

  public function pre_validate(Form $form)
  {
    foreach ($this->choices as $v => $_) {
      if ($this->data == $v) {
        return;
      }
    }

    throw new ValueError("Not a valid choice");
  }
}