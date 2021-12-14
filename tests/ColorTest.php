<?php
use PHPUnit\Framework\TestCase;
include './src/Color.php';

final class ColorTest extends TestCase
{
    public function testColorValid()
    {
        $color = new Color(-0.5, 0.4, 1.7);
        $this->assertEquals($color->red, -0.5);
        $this->assertEquals($color->green, 0.4);
        $this->assertEquals($color->blue, 1.7);
    }

    public function testAddColors()
    {
        $color_a = new Color(0.9, 0.6, 0.75);
        $color_b = new Color(0.7, 0.1, 0.25);
        $new_color = $color_a->addColor($color_b);
        $this->assertEquals($new_color->red, 1.6);
        $this->assertEquals($new_color->green, 0.7);
        $this->assertEquals($new_color->blue, 1.0);
    }

    public function testSubColors()
    {
        $color_a = new Color(0.9, 0.6, 0.75);
        $color_b = new Color(0.7, 0.1, 0.25);
        $new_color = $color_a->subColor($color_b);
        $this->assertEquals($new_color->red, 0.2);
        $this->assertEquals($new_color->green, 0.5);
        $this->assertEquals($new_color->blue, 0.5);
    }

    public function testMultiplyColorScalar()
    {
        $color_a = new Color(0.2, 0.3, 0.4);
        $new_color = $color_a->multiplyColorByScalar(2);
        $this->assertEquals($new_color->red, 0.4);
        $this->assertEquals($new_color->green, 0.6);
        $this->assertEquals($new_color->blue, 0.8);
    }

    public function testMultiplyColors()
    {
        $color_a = new Color(1, 0.2, 0.4);
        $color_b = new Color(0.9, 1, 0.1);
        $new_color = $color_a->multiplyColor($color_b);
        $this->assertEquals($new_color->red, 0.9);
        $this->assertEquals($new_color->green, 0.2);
        $this->assertEquals($new_color->blue, 0.04);
    }


}
