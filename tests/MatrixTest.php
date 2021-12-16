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

    public function testMultiplyTwoMatrices()
    {
        $matrix_a = [
            [1,2,3,4],
            [5,6,7,8],
            [9,8,7,6],
            [5,4,3,2]
        ];
        $matrix_b = [
            [-2, 1, 2, 3],
            [3, 2, 1, -1],
            [4, 3, 6, 5],
            [1, 2, 7, 8]
        ];

        $matrix_c = Matrix::multiply($matrix_a, $matrix_b);

        $this->assertEquals($matrix_c[0][0], 20);
        $this->assertEquals($matrix_c[0][1], 22);
        $this->assertEquals($matrix_c[0][2], 50);
        $this->assertEquals($matrix_c[0][3], 48);
        $this->assertEquals($matrix_c[1][0], 44);
        $this->assertEquals($matrix_c[1][1], 54);
        $this->assertEquals($matrix_c[1][2], 114);
        $this->assertEquals($matrix_c[1][3], 108);
        $this->assertEquals($matrix_c[2][0], 40);
        $this->assertEquals($matrix_c[2][1], 58);
        $this->assertEquals($matrix_c[2][2], 110);
        $this->assertEquals($matrix_c[2][3], 102);
        $this->assertEquals($matrix_c[3][0], 16);
        $this->assertEquals($matrix_c[3][1], 26);
        $this->assertEquals($matrix_c[3][2], 46);
        $this->assertEquals($matrix_c[3][3], 42);
    }

    public function testMultiplyMatrixAndTuple()
    {
        $matrix = [
            [1,2,3,4],
            [2,4,4,2],
            [8,6,4,1],
            [0,0,0,1]
        ];
        $tuple_matrix = [
            [1],
            [2],
            [3],
            [1]
        ];
        $result_matrix = Matrix::multiply($matrix, $tuple_matrix);
        
        $this->assertEquals($result_matrix[0][0], 18);
        $this->assertEquals($result_matrix[1][0], 24);
        $this->assertEquals($result_matrix[2][0], 33);
        $this->assertEquals($result_matrix[3][0], 1);
    }

    public function testIdentityMatrixMultiplication()
    {
        $identity_matrix = [
            [1,0,0,0],
            [0,1,0,0],
            [0,0,1,0],
            [0,0,0,1]
        ];

        $matrix = [
            [0,1,2,4],
            [1,2,4,8],
            [2,4,8,16],
            [4,8,16,32]
        ];

        $result_matrix = Matrix::multiply($identity_matrix, $matrix);
        $this->assertTrue(Matrix::compare($matrix, $result_matrix));
    }

    public function testIdentityMatrixAndTupleMultiplication()
    {
        $identity_matrix = [
            [1,0,0,0],
            [0,1,0,0],
            [0,0,1,0],
            [0,0,0,1]
        ];

        $tuple_matrix = [
            [1],
            [2],
            [3],
            [4]
        ];

        $result_matrix = Matrix::multiply($identity_matrix, $tuple_matrix);
        $this->assertTrue(Matrix::compare($tuple_matrix, $result_matrix));
    }

    public function testMatrixTranspose()
    {
        $matrix = [
            [0,9,3,0],
            [9,8,0,8],
            [1,8,5,3],
            [0,0,5,8]
        ];

        $transposed_matrix = [
            [0,9,1,0],
            [9,8,8,0],
            [3,0,5,5],
            [0,8,3,8]
        ];

        $this->assertTrue(Matrix::compare($transposed_matrix, Matrix::transpose($matrix)));
    }

    public function testTransposeIdentityMatrix()
    {
        $identity_matrix = [
            [1,0,0,0],
            [0,1,0,0],
            [0,0,1,0],
            [0,0,0,1]
        ];

        $transposed_identity_matrix = Matrix::transpose($identity_matrix);

        $this->assertTrue(Matrix::compare($identity_matrix, $transposed_identity_matrix));
    }
}
