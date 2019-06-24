<?php

namespace VS\Tourist\Move;

/**
 * Interface MoveInterface
 * @package VS\Tourist\Move
 */
interface MoveInterface
{
    public const MOVE_HORIZONTAL = 1;
    public const MOVE_VERTICAL = 2;

    /**
     * @param int $direction
     * @return float
     */
    public function calculate(int $direction): float;
}