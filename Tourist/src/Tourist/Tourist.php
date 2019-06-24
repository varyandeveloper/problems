<?php

namespace VS\Tourist\Tourist;

use VS\Tourist\Advice\AdviceInterface;
use VS\Tourist\Move\MoveInterface;

/**
 * Class Tourist
 * @package VS\Tourist
 */
class Tourist implements TouristInterface
{
    /**
     * @var AdviceInterface[]
     */
    protected $advices;
    /**
     * @var float
     */
    protected $posX = 0.0;
    /**
     * @var float
     */
    protected $posY = 0.0;
    /**
     * @var float
     */
    protected $difference;
    /**
     * @var array
     */
    protected $lines = [];

    /**
     * Tourist constructor.
     * @param AdviceInterface ...$advices
     */
    public function __construct(AdviceInterface ...$advices)
    {
        $this->advices = $advices;
    }

    /**
     * Calculate required data
     */
    public function calculate(): void
    {
        foreach ($this->advices as $advice) {
            $lineX = 0;
            $lineY = 0;
            foreach ($advice->getMoves() as $move) {
                $lineX += $move->calculate(MoveInterface::MOVE_HORIZONTAL);
                $lineY += $move->calculate(MoveInterface::MOVE_VERTICAL);
            }
            $this->posX +=  $lineX + $advice->getStartX();
            $this->posY +=  $lineY + $advice->getStartY();
            $this->lines[] = [$lineX + $advice->getStartX(), $lineY + $advice->getStartY()];
        }
    }

    /**
     * @return array
     */
    public function getCalculatedCoordinates(): array
    {
        $count = count($this->advices);

        if (!$count) {
            throw new \InvalidArgumentException('Tourist requires at list one advice to start calculation');
        }

        return [number_format($this->posX / $count, 4), number_format($this->posY / $count, 4)];
    }

    /**
     * @return float
     */
    public function getMaxStraightLineAndAverageDirectionDiff(): float
    {
        [$averageX, $averageY] = $this->getCalculatedCoordinates();
        $max = 0;

        foreach ($this->lines as $line) {
            [$x, $y] = $line;

            $current = sqrt((($averageX - $x)**2) + pow(($averageY - $y), 2));
            if ($current > $max) {
                $max = $current;
            }
        }

        return $max;
    }
}