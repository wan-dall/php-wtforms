<?php
/**
 * Created by PhpStorm.
 * User: Wes
 * Date: 3/18/2016
 * Time: 9:47 PM
 */

namespace WTForms\Tests\Common;


class HelpersTest extends \PHPUnit_Framework_TestCase
{
    public function testHtmlParams()
    {
        $actual = html_params([
            'foo'        => true,
            'bar'        => "baz",
            "data_value" => "shazbot",
            "id"         => "some_id",
            "class__"    => ["fa", "fa-envelope"],
            "for"        => "another_id"
        ]);
        $this->assertContains("foo", $actual);
        $this->assertContains('bar="baz"', $actual);
        $this->assertContains('data-value="shazbot"', $actual);
        $this->assertContains('id="some_id"', $actual);
        $this->assertContains('class="fa fa-envelope"', $actual);
        $this->assertContains('for="another_id"', $actual);
    }

    public function testStartsWith()
    {
        $this->assertTrue(starts_with("_foobar", "_foo"));
        $this->assertFalse(starts_with("_foobar", "_baz"));
        $this->assertFalse(starts_with("_foobar", "bar"));
        $this->assertFalse(starts_with("blah", null));
    }

    public function testStrContains()
    {
        $this->assertTrue(str_contains("_foobar", "oba"));
        $this->assertFalse(str_contains("_foobar", "periwinkle"));
        $this->assertFalse(str_contains("_foobar", null));
    }

    public function testVsprintfNamed()
    {
        $this->assertEquals("Sally walks with Rick",
            vsprintf_named("%(foo)s walks with %(bar)s", ["foo" => "Sally", "bar" => "Rick"]));
        $this->assertEquals("Sally has 5 cats.",
            vsprintf_named("%(foo)s has %(num)d cats.", ["foo" => "Sally", "num" => 5]));
        $this->assertEquals("Sally is not a crazy cat lady; she's just going through a rough romantic period in her life",
            vsprintf_named("%(foo)s is not a crazy cat lady; she's just going through a rough romantic period in her life",
                ["foo" => "Sally"]));
    }
}
