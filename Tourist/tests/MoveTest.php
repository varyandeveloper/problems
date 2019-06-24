<?php

/**
 * Class MoveTest
 */
class MoveTest extends \PHPUnit\Framework\TestCase
{
    public function testMoveHorizontalCalculation()
    {
        $move = new \VS\Tourist\Move\Move(0, 10);
        $this->assertEquals($move->calculate(\VS\Tourist\Move\Move::MOVE_HORIZONTAL), 10);
    }

    public function testMoveVerticalCalculation()
    {
        $move = new \VS\Tourist\Move\Move(0, 10);
        $this->assertEquals($move->calculate(\VS\Tourist\Move\Move::MOVE_VERTICAL), 0);
    }

    public function testMoveHorizontalAndVertical()
    {
        $move = new \VS\Tourist\Move\Move(12, 10);
        $this->assertEquals(number_format($move->calculate(\VS\Tourist\Move\Move::MOVE_VERTICAL), 2), 2.08);
        $this->assertEquals(number_format($move->calculate(\VS\Tourist\Move\Move::MOVE_HORIZONTAL), 2), 9.78);
    }

    public function testIncorrectMoveDirectionToThrowAnException()
    {
        $this->expectException(\VS\Tourist\Exceptions\InvalidMoveTypeException::class);
        $move = new \VS\Tourist\Move\Move(0, 10);
        $move->calculate(3);
    }
}