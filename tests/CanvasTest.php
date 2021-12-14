<?php
use PHPUnit\Framework\TestCase;
include './src/Canvas.php';

final class CanvasTest extends TestCase
{
    public function testCanvasCreate()
    {
        $canvas = new Canvas(10, 20);
        $this->assertEquals($canvas->width, 10);
        $this->assertEquals($canvas->height, 20);
        for($i = 0; $i < $canvas->height; $i++){
            for($j = 0; $j < $canvas->width; $j++){
                $this->assertEquals($canvas->canvas[$i][$j]->red, 0);
                $this->assertEquals($canvas->canvas[$i][$j]->green, 0);
                $this->assertEquals($canvas->canvas[$i][$j]->blue, 0);
            }
        }
    }

    public function testCanvasWrite()
    {
        $canvas = new Canvas(10, 20);
        $red = new Color(1, 0, 0);
        $canvas->writeColor($red, 2, 3);
        $this->assertEquals($canvas->canvas[2][3]->red, 1);
        $this->assertEquals($canvas->canvas[2][3]->green, 0);
        $this->assertEquals($canvas->canvas[2][3]->blue, 0);
    }
}