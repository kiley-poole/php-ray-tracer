<?php
use PHPUnit\Framework\TestCase;
include './src/Tuple.php';

final class TupleTest extends TestCase
{
    public function testTupleIsPoint()
    {
        $tuple = new Tuple(4.3, -4.2, 3.1, 1.0);
        $this->assertEquals($tuple->x, 4.3);
        $this->assertEquals($tuple->y, -4.2);
        $this->assertEquals($tuple->z, 3.1);
        $this->assertEquals($tuple->w, 1.0);

    }

    public function testTupleIsVector()
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

    public function testAddVectorPointGetPoint()
    {
        $point = Tuple::createPoint(3, -2, 5);
        $vector = Tuple::createVector(-2, 3, 1);
        $point->addTuple($vector);
        $this->assertEquals($point->x, 1);
        $this->assertEquals($point->y, 1);
        $this->assertEquals($point->z, 6);
        $this->assertEquals($point->w, 1);
    }

    public function testAddVectorVectorGetVector()
    {
        $vector_a = Tuple::createVector(3, -2, 5);
        $vector_b = Tuple::createVector(-2, 3, 1);
        $vector_a->addTuple($vector_b);
        $this->assertEquals($vector_a->x, 1);
        $this->assertEquals($vector_a->y, 1);
        $this->assertEquals($vector_a->z, 6);
        $this->assertEquals($vector_a->w, 0);
    }

    public function testSubTwoPointsGetVector()
    {
        $point_a = Tuple::createPoint(3, 2, 1);
        $point_b = Tuple::createPoint(5, 6, 7);
        $point_a->subTuple($point_b);
        $this->assertEquals($point_a->x, -2);
        $this->assertEquals($point_a->y, -4);
        $this->assertEquals($point_a->z, -6);
        $this->assertEquals($point_a->w, 0);
    }

    public function testSubVectorFromPointGetPoint()
    {
        $point = Tuple::createPoint(3, 2, 1);
        $vector = Tuple::createVector(5, 6, 7);
        $point->subTuple($vector);
        $this->assertEquals($point->x, -2);
        $this->assertEquals($point->y, -4);
        $this->assertEquals($point->z, -6);
        $this->assertEquals($point->w, 1);
    }

    public function testSubVectorVectorGetVector()
    {
        $vector_a = Tuple::createVector(3, 2, 1);
        $vector_b = Tuple::createVector(5, 6, 7);
        $vector_a->subTuple($vector_b);
        $this->assertEquals($vector_a->x, -2);
        $this->assertEquals($vector_a->y, -4);
        $this->assertEquals($vector_a->z, -6);
        $this->assertEquals($vector_a->w, 0);
    }

    public function testNegateTuple()
    {
        $tuple = new Tuple(1, -2, 3, -4);
        $tuple->negate();
        $this->assertEquals($tuple->x, -1);
        $this->assertEquals($tuple->y, 2);
        $this->assertEquals($tuple->z, -3);
        $this->assertEquals($tuple->w, 4);
    }

    public function testMultiplyTuple(){
        $tuple = new Tuple(1, -2, 3, -4);
        $tuple->multiplyTuple(3.5);
        $this->assertEquals($tuple->x, 3.5);
        $this->assertEquals($tuple->y, -7);
        $this->assertEquals($tuple->z, 10.5);
        $this->assertEquals($tuple->w, -14);
    }

    public function testMultiplyTupleFraction(){
        $tuple = new Tuple(1, -2, 3, -4);
        $tuple->multiplyTuple(0.5);
        $this->assertEquals($tuple->x, 0.5);
        $this->assertEquals($tuple->y, -1);
        $this->assertEquals($tuple->z, 1.5);
        $this->assertEquals($tuple->w, -2);
    }

    public function testDivideTuple(){
        $tuple = new Tuple(1, -2, 3, -4);
        $tuple->divideTuple(2);
        $this->assertEquals($tuple->x, 0.5);
        $this->assertEquals($tuple->y, -1);
        $this->assertEquals($tuple->z, 1.5);
        $this->assertEquals($tuple->w, -2);
    }

    public function testMagnitudeOne(){
        $vector = Tuple::createVector(1, 0, 0);
        $magnitude = $vector->magnitude();
        $this->assertEquals($magnitude, 1);
    }

    public function testMagnitudeTwo(){
        $vector = Tuple::createVector(0, 1, 0);
        $magnitude = $vector->magnitude();
        $this->assertEquals($magnitude, 1);
    }

    public function testMagnitudeThree(){
        $vector = Tuple::createVector(0, 0, 1);
        $magnitude = $vector->magnitude();
        $this->assertEquals($magnitude, 1);
    }

    public function testMagnitudeFour(){
        $vector = Tuple::createVector(1, 2, 3);
        $magnitude = $vector->magnitude();
        $this->assertEquals($magnitude, sqrt(14));
    }

    public function testMagnitudeFive(){
        $vector = Tuple::createVector(-1, -2, -3);
        $magnitude = $vector->magnitude();
        $this->assertEquals($magnitude, sqrt(14));
    }

    public function testNormalizeVectorOne(){
        $vector = Tuple::createVector(4, 0, 0);
    }

}