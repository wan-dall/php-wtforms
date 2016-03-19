<?php
/**
 * Created by PhpStorm.
 * User: Wes Gilleland
 * Date: 2/2/2016
 * Time: 5:16 PM
 */

namespace WTForms\Widgets\HTML5;

use WTForms\Widgets\Core\Input;

/**
 * Renders an input with type "email".
 * @package WTForms\Widgets\HTML5
 */
class EmailInput extends Input
{
  /**
   * @inheritdoc
   */
  public function __construct()
  {
    parent::__construct("email");
  }
}
