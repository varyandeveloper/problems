<?php

namespace VS\Tourist\Tourist;

/**
 * Interface TouristInterface
 * @package VS\Tourist\Tourist
 */
interface TouristInterface
{
    /**
     * @return mixed
     */
    public function calculate();

    /**
     * @return array
     */
    public function getCalculatedCoordinates(): array;

    /**
     * @return float
     */
    public function getMaxStraightLineAndAverageDirectionDiff(): float;
}