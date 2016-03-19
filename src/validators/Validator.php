<?php
/**
 * Created by PhpStorm.
 * User: Wes
 * Date: 1/21/2016
 * Time: 11:15 AM
 */

namespace WTForms\Validators;

use WTForms\Fields\Core\Field;
use WTForms\Form;
use WTForms\NotImplemented;

class Validator
{
  /**
   * @var string Error message to raise in case of a validation error
   */
  public $message;
  /**
   * @var array
   */
  public $field_flags = [];

  /**
   * @param Form   $form
   * @param Field  $field
   * @param string $message
   *
   * @throws NotImplemented
   */
  function __invoke(Form $form, Field $field, $message = "")
  {
    throw new NotImplemented("Validator must have an overridden __invoke method");
  }
}
