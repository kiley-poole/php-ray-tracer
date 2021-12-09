<?php
use PHPUnit\Framework\TestCase;
include './src/Tuple.php';

final class TupleTest extends TestCase
{
    private function testTupleIsPoint()
    {
        $tuple = new Tuple(4.3, -4.2, 3.1, 1.0);
        $this->assertEquals($tuple->x, 4.3);
        $this->assertEquals($tuple->y, -4.2);
        $this->assertEquals($tuple->z, 3.1);
        $this->assertEquals($tuple->w, 1.0);

    }

    private function testTupleIsVector()
    {
        $tuple = new Tuple(4.3, -4.2, 3.1, 0.0);
        $this->assertEquals($tuple->x, 4.3);
        $this->assertEquals($tuple->y, -4.2);
        $this->assertEquals($tuple->z, 3.1);
        $this->assertEquals($tuple->w, 0.0);

    }

    public function testCreatePoint()
    {
        $tuple = Tuple::createPoint(4, -3, 3);
        $this->assertEquals($tuple->x, 4.0);
        $this->assertEquals($tuple->y, -3.0);
        $this->assertEquals($tuple->z, 3.0);
        $this->assertEquals($tuple->w, 1.0);

    }

    public function testCreateVector()
    {
        $tuple = Tuple::createVector(4, -4, 3);
        $this->assertEquals($tuple->x, 4.0);
        $this->assertEquals($tuple->y, -4.0);
        $this->assertEquals($tuple->z, 3.0);
        $this->assertEquals($tuple->w, 0.0);

    }
}