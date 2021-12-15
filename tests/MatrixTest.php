<?php
use PHPUnit\Framework\TestCase;
include './src/Matrix.php';


final class MatrixTest extends TestCase
{
    public function testMatrix4x4Create()
    {
        $matrix= [
            [1,2,3,4],
            [5.5, 6.5, 7.5],
            [9,10,11,12],
            [13.5, 14.5, 15.5, 16.5]
        ];

        $this->assertEquals($matrix[0][0], 1);
        $this->assertEquals($matrix[0][3], 4);
        $this->assertEquals($matrix[1][0], 5.5);
        $this->assertEquals($matrix[1][2], 7.5);
        $this->assertEquals($matrix[2][2], 11);
        $this->assertEquals($matrix[3][0], 13.5);
        $this->assertEquals($matrix[3][2], 15.5);
    }

    public function testMatrix2x2Create()
    {
        $matrix = [[-3,5],[1,-2]];
        $this->assertEquals($matrix[0][0], -3);
        $this->assertEquals($matrix[0][1], 5);
        $this->assertEquals($matrix[1][0], 1);
        $this->assertEquals($matrix[1][1], -2);
    }

    public function testMatrix3x3Create()
    {
        $matrix = [[-3,5,0],[1,-2, -7], [0, 1, 1]];
        $this->assertEquals($matrix[0][0], -3);
        $this->assertEquals($matrix[1][1], -2);
        $this->assertEquals($matrix[2][2], 1);
    }

    public function testMatrixComparisonTrue()
    {
        $matrix_a = [
            [1,2,3,4],
            [4,5,6,7],
            [8,9,10,11],
            [12,13,14,15]
        ];
        $matrix_b = [
            [1,2,3,4],
            [4,5,6,7],
            [8,9,10,11],
            [12,13,14,15]
        ];
        $this->assertTrue(Matrix::compare($matrix_a, $matrix_b));
    }

    public function testMatrixComparisonFalse()
    {
        $matrix_a = [
            [1,2,3,4],
            [4,5,6,7],
            [8,9,10,11],
            [12,13,14,13]
        ];
        $matrix_b = [
            [1,2,3,4],
            [4,5,6,7],
            [8,9,10,11],
            [12,13,14,15]
        ];
        $this->assertFalse(Matrix::compare($matrix_a, $matrix_b));
    }
}
