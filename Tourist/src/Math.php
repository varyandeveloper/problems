<?php

namespace VS\Tourist;

/**
 * Class Math
 * @package VS\Tourist
 */
class Math
{
    /**
     * @param float $angle
     * @return float
     */
    public static function sin(float $angle): float
    {
        return number_format(sin(deg2rad($angle)), 4);
    }

    /**
     * @param float $angle
     * @return float
     */
    public static function cos(float $angle): float
    {
        return number_format(cos(deg2rad($angle)), 4);
    }
}