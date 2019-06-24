<?php

namespace VS\Tourist\Advice;

use VS\Tourist\Exceptions\InvalidAdviceException;
use VS\Tourist\Move\Move;
use VS\Tourist\Move\MoveInterface;

/**
 * Class Advice
 * @package VS\Tourist
 */
class Advice implements AdviceInterface
{
    /**
     * @var float
     */
    protected $startX;
    /**
     * @var float
     */
    protected $startY;
    /**
     * @var float
     */
    protected $startAngle;
    /**
     * @var MoveInterface[]
     */
    protected $moves;

    /**
     * Advice constructor.
     * @param float $startX
     * @param float $startY
     * @param float $startAngle
     * @param array $moves
     */
    public function __construct(float $startX, float $startY, float $startAngle, array $moves)
    {
        $this->startX = $startX;
        $this->startY = $startY;
        $this->startAngle = $startAngle;
        $this->initMoves($moves);
    }

    /**
     * @return float
     */
    public function getStartX(): float
    {
        return $this->startX;
    }

    /**
     * @return float
     */
    public function getStartY(): float
    {
        return $this->startY;
    }

    /**
     * @return float
     */
    public function getStartAngle(): float
    {
        return $this->startAngle;
    }

    /**
     * @return MoveInterface[]
     */
    public function getMoves(): array
    {
        return $this->moves;
    }

    /**
     * @param array $moves
     */
    protected function initMoves(array $moves): void
    {
        $currentAngle = $this->getStartAngle();
        foreach ($moves as $move) {
            [$type, $value] = $move;

            if ($type === self::ADVICE_TURN) {
                $currentAngle += $value;
            } elseif($type === self::ADVICE_WALK) {
                $this->moves[] = new Move($currentAngle, $value);
            } else {
                throw new InvalidAdviceException('Invalid advice type');
            }
        }
    }
}