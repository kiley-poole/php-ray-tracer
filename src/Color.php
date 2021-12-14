<?php

class Color
{
    public float $red;
    public float $green;
    public float $blue;

    public function __construct(float $red = 0.0, float $green = 0.0, float $blue = 0.0)
    {   
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    public function addColor(Color $color): Color
    {
        $red = $this->red + $color->red;
        $green = $this->green + $color->green;
        $blue = $this->blue + $color->blue;
        return new Color($red, $green, $blue);
    }

    public function subColor(Color $color): Color
    {
        $red = $this->red - $color->red;
        $green = $this->green - $color->green;
        $blue = $this->blue - $color->blue;
        return new Color($red, $green, $blue);
    }

    public function multiplyColorByScalar(float $value): Color
    {
        $red = $this->red * $value; 
        $green = $this->green * $value; 
        $blue = $this->blue * $value; 
        return new Color($red, $green, $blue);
    }

    public function multiplyColor(Color $color): Color
    {
        $red = $this->red * $color->red; 
        $green = $this->green * $color->green; 
        $blue = $this->blue * $color->blue; 
        return new Color($red, $green, $blue);
    }

}