<?php
/**
 * Created by PhpStorm.
 * User: Wes Gilleland
 * Date: 5/31/2016
 * Time: 4:43 PM
 */

namespace WTForms\Tests\Fields;


use Carbon\Carbon;
use WTForms\Fields\Core\DateTimeField;
use WTForms\Form;

class DateTimeFieldTest extends \PHPUnit_Framework_TestCase
{
  /**
   * @var Form
   */
  public $form;

  protected function setUp()
  {
    $form = new Form();
    $form->a = new DateTimeField();
    $form->b = new DateTimeField(["format" => "%Y-%m-%d %H:%i"]);
    $this->form = $form;
  }

  public function testBasic()
  {
    $d = Carbon::create(2008, 5, 5, 4, 30, 0);
    $this->form->process(["formdata" => ["a" => ["2008-05-05", "04:30:00"], "b" => ["2008-05-05 04:30"]]]);
    $this->assertEquals($d, $this->form->a->data);
    $this->assertEquals('<input id="a" name="a" type="text" value="2008-05-05 04:30:00">', "{$this->form->a}");
    $this->assertEquals($d, $this->form->b->data);
    $this->assertEquals('<input id="b" name="b" type="text" value="2008-05-05 04:30">', "{$this->form->b}");
    $this->assertTrue($this->form->validate());

    $this->setUp();
    $this->form->process(["formdata" => ['2008-05-05']]);
//    $this->assertFalse($this->form->validate());
//    $this->assertEquals('Not a valid datetime value', $this->form->a->errors);
  }

}
