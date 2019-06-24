<?php

/**
 * Class AdviceTest
 */
class AdviceTest extends \PHPUnit\Framework\TestCase
{
    public function testAdviceMovesToBeAnInstanceOfMoveInterface()
    {
        $advice = new \VS\Tourist\Advice\Advice(30, 40, 90, [
            [\VS\Tourist\Advice\Advice::ADVICE_WALK, 5],
            [\VS\Tourist\Advice\Advice::ADVICE_TURN, 90]
        ]);
        $checked = true;

        foreach ($advice->getMoves() as $move) {
            if (!$move instanceof \VS\Tourist\Move\MoveInterface) {
                $checked = false;
                break;
            }
        }

        $this->assertTrue($checked);
    }

    public function testIncorrectAdviceTypeToThrowAnException()
    {
        $this->expectException(\VS\Tourist\Exceptions\InvalidAdviceException::class);
        new \VS\Tourist\Advice\Advice(30, 40, 90, [
            [\VS\Tourist\Advice\Advice::ADVICE_WALK, 5],
            ['test', 90]
        ]);
    }
}