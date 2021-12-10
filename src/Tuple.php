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

    public function addTuple(Tuple $tuple): void
    {
        $this->x += $tuple->x;
        $this->y += $tuple->y;
        $this->z += $tuple->z;
        $this->w += $tuple->w;
 
    }

    public function subTuple(Tuple $tuple): void
    {
        $this->x -=  $tuple->x;
        $this->y -=  $tuple->y;
        $this->z -=  $tuple->z;
        $this->w -=  $tuple->w;
    }
    
    public function negate(): void
    {
        $this->x = -$this->x; 
        $this->y = -$this->y; 
        $this->z = -$this->z; 
        $this->w = -$this->w;
    }

    public function multiplyTuple(float $value): void
    {
        $this->x *= $value; 
        $this->y *= $value; 
        $this->z *= $value; 
        $this->w *= $value;
    }

    public function divideTuple(float $value): void
    {
        $this->x /= $value; 
        $this->y /= $value; 
        $this->z /= $value; 
        $this->w /= $value;
         
    }

    public function magnitude(): float
    {
        return sqrt(
            ($this->x*$this->x) +
            ($this->y*$this->y) +
            ($this->z*$this->z) +
            ($this->w*$this->w)
        );
    }

    // TODO Move creates to factory class
    static public function createPoint(float $x = 0.0, float $y = 0.0, float $z = 0.0): Tuple 
    {
        return new Tuple($x, $y, $z, $w = 1.0);
    }

    static public function createVector(float $x = 0.0, float $y = 0.0, float $z = 0.0): Tuple 
    {
        return new Tuple($x, $y, $z, $w = 0.0);
    }
}