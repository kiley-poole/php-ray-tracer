<?php

class Matrix
{
    static public function compare(array $matrix_a, array $matrix_b): bool
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

    static public function multiply(array $matrix_a, array $matrix_b): array
    {
        $a_rows = count($matrix_a);
        $a_cols = count($matrix_a[0]);
        $b_cols = count($matrix_b[0]);
        
        $matrix_c = array_fill(0, count($matrix_a), array_fill(0, count($matrix_b[0]), 0));

        for ($i = 0; $i < $a_rows; $i++) {
            for ($j = 0; $j < $a_cols; $j++) {
              for ($k = 0; $k < $b_cols; $k++)
                $matrix_c[$i][$k] += $matrix_a[$i][$j] * $matrix_b[$j][$k];
          }
        }

        return $matrix_c;
    }

    static public function transpose(array $matrix): array
    {
        $transposed_matrix = [];
        
        for($i = 0; $i < count($matrix); $i++){
            for($j = 0; $j < count($matrix[$i]); $j++){
                $transposed_matrix[$j][$i] = $matrix[$i][$j];
            }
        }

        return $transposed_matrix;
    }
}