<?php

namespace VS\Tourist\Move;

use VS\Tourist\Exceptions\InvalidMoveTypeException;
use VS\Tourist\Math;

/**
 * Class Move
 * @package VS\Tourist\Move
 */
class Move implements MoveInterface
{
    /**
     * @var float
     */
    protected $turn;
    /**
     * @var float
     */
    protected $walk;

    /**
     * Move constructor.
     * @param float $turn
     * @param float $walk
     */
    public function __construct(float $turn, float $walk)
    {
        $this->turn = $turn;
        $this->walk = $walk;
    }

    /**
     * @param int $direction
     * @return float
     */
    public function calculate(int $direction): float
    {
        $this->validateDirection($direction);
        return $direction === self::MOVE_HORIZONTAL
            ? $this->walk * Math::cos($this->turn)
            : $this->walk * Math::sin($this->turn);
    }

    /**
     * @param int $direction
     */
    protected function validateDirection(int $direction): void
    {
        if (!in_array($direction, [self::MOVE_HORIZONTAL, self::MOVE_VERTICAL], true)) {
            throw new InvalidMoveTypeException('Invalid move direction');
        }
    }
}