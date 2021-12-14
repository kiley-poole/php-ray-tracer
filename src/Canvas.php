<?php

class Canvas
{
    public int $width;
    public int $height;
    public array $canvas;

    public function __construct(int $width = 0, int $height = 0)
    {
        $this->height = $height;
        $this->width = $width;
        $this->canvas = $this->buildCanvas();
    }

    public function writeColor($color, $x, $y)
    {
        $this->canvas[$x][$y] = $color;
    }

    private function buildCanvas(): array
    {
        $canvas = array_fill(0, $this->height, array_fill(0, $this->width, new Color(0,0,0)));
        return $canvas;
    }

}