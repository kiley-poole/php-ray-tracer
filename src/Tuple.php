<?php

class Tuple
{
    public float $x;
    public float $y;
    public float $z;
    public float $w;

    public function __construct(float $x = 0.0, float $y = 0.0, float $z = 0.0, float $w = 0.0, bool $point = false)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->w = $w;
    }

    static public function createPoint(float $x = 0.0, float $y = 0.0, float $z = 0.0): Tuple {
        return new Tuple($x, $y, $z, $w = 1.0);
    }

    static public function createVector(float $x = 0.0, float $y = 0.0, float $z = 0.0): Tuple {
        return new Tuple($x, $y, $z, $w = 0.0);
    }
}