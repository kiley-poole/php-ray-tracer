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

    public function testCanvasToPPMHeader()
    {
        $canvas = new Canvas(5, 3);
        $ppm_string = $canvas->canvasToPPM();
        $sep = "\n";
        $line = strtok($ppm_string, $sep);
        
        $this->assertEquals($line, "P3");
        $line = strtok($sep);
        $this->assertEquals($line, "5 3");
        $line = strtok($sep);
        $this->assertEquals($line, "255");
    }

    public function testCanvasToPPM()
    {
        $canvas = new Canvas(5, 3);

        $color1 = new Color(1.5, 0, 0);
        $color2 = new Color(0, 0.5, 0);
        $color3 = new Color(-0.5, 0, 1);

        $canvas->writeColor($color1, 0, 0);
        $canvas->writeColor($color2, 1, 2);
        $canvas->writeColor($color3, 2, 4);

        $ppm_string = $canvas->canvasToPPM();

        $sep = "\n";
        $line = strtok($ppm_string, $sep);

        $this->assertEquals($line, "P3");
        $line = strtok($sep);
        $this->assertEquals($line, "5 3");
        $line = strtok($sep);
        $this->assertEquals($line, "255");
        $line = strtok($sep);
        $this->assertEquals($line, "255 0 0 0 0 0 0 0 0 0 0 0 0 0 0 ");
        $line = strtok($sep);
        $this->assertEquals($line, "0 0 0 0 0 0 0 128 0 0 0 0 0 0 0 ");
        $line = strtok($sep);
        $this->assertEquals($line, "0 0 0 0 0 0 0 0 0 0 0 0 0 0 255 ");    
    }

    public function testPPMLineSplit()
    {
        $canvas = new Canvas(10, 2);
        $color = new Color(1, 0.8, 0.6);

        for($i = 0; $i < $canvas->height; $i++){
            for($j = 0; $j < $canvas->width; $j++){
                $canvas->writeColor($color, $i, $j);
            }
        }

        $ppm_string = $canvas->canvasToPPM();
        $ppm_strings = explode("\n", $ppm_string);

        $this->assertEquals($ppm_strings[3], "255 204 153 255 204 153 255 204 153 255 204 153 255 204 153 255 204 ");
        $this->assertEquals($ppm_strings[4], "153 255 204 153 255 204 153 255 204 153 255 204 153 ");
        $this->assertEquals($ppm_strings[5], "255 204 153 255 204 153 255 204 153 255 204 153 255 204 153 255 204 ");
        $this->assertEquals($ppm_strings[6], "153 255 204 153 255 204 153 255 204 153 255 204 153 ");
    }

    public function testPPMLastLine()
    {
        $canvas = new Canvas(5, 3);

        $ppm_string = $canvas->canvasToPPM();

        $this->assertEquals(substr($ppm_string, -1), "\n");
    }

}