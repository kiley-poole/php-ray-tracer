<?php

class Tuple
{
    public float $x;
    public float $y;
    public float $z;
    public float $w;

    public function __construct(float $x = 0.0, float $y = 0.0, float $z = 0.0, float $w = 0.0)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->w = $w;
    }

    public function addTuple(Tuple $tuple): Tuple
    {
        $x = $this->x + $tuple->x;
        $y = $this->y + $tuple->y;
        $z = $this->z + $tuple->z;
        $w = $this->w + $tuple->w;
        return new Tuple($x, $y, $z, $w);
    }

    public function subTuple(Tuple $tuple): Tuple
    {
        $x = $this->x - $tuple->x;
        $y = $this->y - $tuple->y;
        $z = $this->z - $tuple->z;
        $w = $this->w - $tuple->w;
        return new Tuple($x, $y, $z, $w);
    }
    
    public function negate(): Tuple
    {
        $x = -$this->x; 
        $y = -$this->y; 
        $z = -$this->z; 
        $w = -$this->w;
        return new Tuple($x, $y, $z, $w);
    }

    public function multiplyTuple(float $value): Tuple
    {
        $x = $this->x * $value; 
        $y = $this->y * $value; 
        $z = $this->z * $value; 
        $w = $this->w * $value;
        return new Tuple($x, $y, $z, $w);
    }

    public function divideTuple(float $value): Tuple
    {
        $x = $this->x / $value; 
        $y = $this->y / $value; 
        $z = $this->z / $value; 
        $w = $this->w / $value;
        return new Tuple($x, $y, $z, $w); 
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

    public function normalize()
    {
        $magnitude = $this->magnitude();
        $x = $this->x / $magnitude; 
        $y = $this->y / $magnitude; 
        $z = $this->z / $magnitude; 
        $w = $this->w / $magnitude; 
        return new Tuple($x, $y, $z, $w);
    }

    public function dotProduct(Tuple $vector): float
    {
        return (
            ($this->x * $vector->x) + 
            ($this->y * $vector->y) + 
            ($this->z * $vector->z) + 
            ($this->w * $vector->w)  
        );
    }
    
    public function crossProduct(Tuple $vector)
    {
        $cross_x = ($this->y * $vector->z) - ($this->z * $vector->y);
        $cross_y = ($this->z * $vector->x) - ($this->x * $vector->z);
        $cross_z = ($this->x * $vector->y) - ($this->y * $vector->x);

        return Tuple::createVector($cross_x, $cross_y, $cross_z);
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