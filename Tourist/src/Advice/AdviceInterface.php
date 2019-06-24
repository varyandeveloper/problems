<?php

namespace VS\Tourist\Advice;

use VS\Tourist\Move\MoveInterface;

/**
 * Interface AdviceInterface
 * @package VS\Tourist
 */
interface AdviceInterface
{
    public const ADVICE_TURN = 'turn';
    public const ADVICE_WALK = 'walk';

    /**
     * @return float
     */
    public function getStartX(): float;

    /**
     * @return float
     */
    public function getStartY(): float;

    /**
     * @return float
     */
    public function getStartAngle(): float;
    /**
     * @return MoveInterface[]
     */
    public function getMoves(): array;
}