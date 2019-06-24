<?php

/**
 * Class TouristTest
 */
class TouristTest extends \PHPUnit\Framework\TestCase
{
    public function testTouristCalculation1()
    {
        $advice1 = new \VS\Tourist\Advice\Advice(...EXAMPLE1[0]);
        $advice2 = new \VS\Tourist\Advice\Advice(...EXAMPLE1[1]);
        $advice3 = new \VS\Tourist\Advice\Advice(...EXAMPLE1[2]);

        $tourist = new \VS\Tourist\Tourist\Tourist($advice1, $advice2, $advice3);
        $tourist->calculate();

        $twoCoordinates = $tourist->getCalculatedCoordinates();

        $this->assertCount(2, $twoCoordinates);

        $twoCoordinates[0] = number_format($twoCoordinates[0], 4);
        $twoCoordinates[1] = number_format($twoCoordinates[1], 4);

        $this->assertEquals($twoCoordinates, [97.1547, 40.2327]);
        $this->assertEquals(number_format($tourist->getMaxStraightLineAndAverageDirectionDiff(), 4), 7.6316);
    }

    public function testTouristCalculation2()
    {
        $firstAdvice = new \VS\Tourist\Advice\Advice(...EXAMPLE2[0]);

        $secondAdvice = new \VS\Tourist\Advice\Advice(...EXAMPLE2[1]);

        $tourist = new \VS\Tourist\Tourist\Tourist($firstAdvice, $secondAdvice);
        $tourist->calculate();

        $twoCoordinates = $tourist->getCalculatedCoordinates();

        $this->assertCount(2, $twoCoordinates);
        $this->assertEquals($twoCoordinates, [30, 45]);
        $this->assertEquals($tourist->getMaxStraightLineAndAverageDirectionDiff(), 0);
    }
}