<?php
use PHPUnit\Framework\TestCase;
include './src/Utils.php';

final class UtilsTest extends TestCase
{
    public function testFloatEqualityTrue()
    {
        $this->assertTrue(Util::floatEquality(1.0, 1.0));
    }

    public function testFloatEqualityFalse()
    {
        $this->assertFalse(Util::floatEquality(1.0, 2.0));
    }

    public function testPointEqualityTrue()
    {
        $point_a = Tuple::createPoint(1.0, 2.0, 3.0);
        $point_b = Tuple::createPoint(1.0, 2.0, 3.0);
        $this->assertTrue(Util::compareTuple($point_a, $point_b));
    }

    public function testPointEqualityFalse()
    {
        $point_a = Tuple::createPoint(-1.0, 2.0, 3.0);
        $point_b = Tuple::createPoint(1.0, 2.0, 3.0);
        $this->assertFalse(Util::compareTuple($point_a, $point_b));
    }

    public function testVectorEqualityTrue()
    {
        $vector_a = Tuple::createVector(1.0, 2.0, 3.0);
        $vector_b = Tuple::createVector(1.0, 2.0, 3.0);
        $this->assertTrue(Util::compareTuple($vector_a, $vector_b));
    }

    public function testVectorEqualityFalse()
    {
        $vector_a = Tuple::createVector(-1.0, 2.0, 3.0);
        $vector_b = Tuple::createVector(1.0, 2.0, 3.0);
        $this->assertFalse(Util::compareTuple($vector_a, $vector_b));
    }
}