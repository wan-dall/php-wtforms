<?php
/**
 * Created by PhpStorm.
 * User: Wes
 * Date: 2/3/2016
 * Time: 9:08 PM
 */

namespace WTForms\Tests\validators;


use WTForms\Form;
use WTForms\Tests\common\AnyOfFormatter;
use WTForms\Tests\common\DummyField;
use WTForms\Validators\AnyOf;

class AnyOfTest extends \PHPUnit_Framework_TestCase
{

    public function testAnyOf()
    {
        $any_of = new AnyOf(['a', 'b', 'c']);
        $this->assertNull($any_of(new Form([]), new DummyField("b")));
        $any_of = new AnyOf([1, 2, 3]);
        $this->assertNull($any_of(new Form([]), new DummyField(2)));
    }

    /**
     * @expectedException \WTForms\Validators\ValidationError
     * @expectedExceptionMessage test 9::8::7
     */
    public function testAnyOfValuesFormatter()
    {
        $any_of = new AnyOf([7, 8, 9], "test %s", new AnyOfFormatter());
        $any_of(new Form([]), new DummyField(4));
    }

    /**
     * @expectedException \WTForms\Validators\ValidationError
     */
    public function testAnyOfValueErrorExceptions1()
    {
        $any_of = new AnyOf(['a', 'b', 'c']);
        $this->assertNull($any_of(new Form([]), new DummyField(null)));
    }

    /**
     * @expectedException \WTForms\Validators\ValidationError
     */
    public function testAnyOfValueErrorExceptions2()
    {
        $any_of = new AnyOf([1,2,3]);
        $this->assertNull($any_of(new Form([]), new DummyField(4)));
    }
}