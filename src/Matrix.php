<?php

class Matrix
{
    static public function compare(array $matrix_a, array $matrix_b)
    {
        if(count($matrix_a) != count($matrix_b) || count($matrix_a[0]) != count($matrix_b[0])){return false;}

        $rows = count($matrix_a);
        $cols = count($matrix_a[0]);

        for($i = 0; $i < $rows; $i++){
            for($j = 0; $j < $cols; $j++){
                if(!Util::floatEquality($matrix_a[$i][$j], $matrix_b[$i][$j])){return false;}
            }
        }
        
        return true;
    }
}