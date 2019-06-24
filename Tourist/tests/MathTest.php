<?php

/**
 * Class MathTest
 */
class MathTest extends \PHPUnit\Framework\TestCase
{
    public function testSin0Degree()
    {
        $this->assertEquals(\VS\Tourist\Math::sin(0), 0);
    }

    public function testSin90Degree()
    {
        $this->assertEquals(\VS\Tourist\Math::sin(90), 1);
    }

    public function testSin180Degree()
    {
        $this->assertEquals(\VS\Tourist\Math::sin(180), 0);
    }

    public function testCos360Degree()
    {
        $this->assertEquals(\VS\Tourist\Math::cos(360), 1);
    }

    public function testCos36Degree()
    {
        $this->assertEquals(\VS\Tourist\Math::cos(36), 0.809);
    }
}