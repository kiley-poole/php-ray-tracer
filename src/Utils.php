<?php

class Util
{
    static public function compareTuple(Tuple $tuple_a, Tuple $tuple_b)
    {
        if(Util::floatEquality($tuple_a->x, $tuple_b->x) && 
            Util::floatEquality($tuple_a->x, $tuple_b->x) &&
            Util::floatEquality($tuple_a->y, $tuple_b->y) &&
            Util::floatEquality($tuple_a->z, $tuple_b->z) &&
            Util::floatEquality($tuple_a->w, $tuple_b->w)){
                return true;
            }
            return false;
    }

    static public function floatEquality(float $a, float $b)
    {
        if (abs($a-$b) < PHP_FLOAT_EPSILON){
            return true;
        }
        return false;
    }
}