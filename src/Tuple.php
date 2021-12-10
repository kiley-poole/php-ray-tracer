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

    public function addTuple(Tuple $tuple): Tuple
    {
        $new_x = $this->x + $tuple->x;
        $new_y = $this->y + $tuple->y;
        $new_z = $this->z + $tuple->z;
        $new_w = $this->w + $tuple->w;
        if(Util::floatEquality($new_w, 1.0)){
            return $this->createPoint($new_x, $new_y, $new_z);   
        }
        return $this->createVector($new_x, $new_y, $new_z);  
    }

    public function subTuple(Tuple $tuple): Tuple
    {
        $new_x = $this->x - $tuple->x;
        $new_y = $this->y - $tuple->y;
        $new_z = $this->z - $tuple->z;
        $new_w = $this->w - $tuple->w;
        if(Util::floatEquality($new_w, 1.0)){
            return $this->createPoint($new_x, $new_y, $new_z);   
        }
        return $this->createVector($new_x, $new_y, $new_z);  
    }
    
    public function negate(): Tuple
    {
        $new_x = -$this->x; 
        $new_y = -$this->y; 
        $new_z = -$this->z; 
        $new_w = -$this->w;
        return new Tuple($new_x, $new_y, $new_z, $new_w); 
    }

    public function multiplyTuple(float $value): Tuple
    {
        $new_x = $this->x * $value; 
        $new_y = $this->y * $value; 
        $new_z = $this->z * $value; 
        $new_w = $this->w * $value;
        return new Tuple($new_x, $new_y, $new_z, $new_w); 
    }

    public function divideTuple(float $value): Tuple
    {
        $new_x = $this->x / $value; 
        $new_y = $this->y / $value; 
        $new_z = $this->z / $value; 
        $new_w = $this->w / $value;
        return new Tuple($new_x, $new_y, $new_z, $new_w); 
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