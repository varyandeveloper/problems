<?php

namespace VS\Tourist;

use VS\Tourist\Advice\Advice;
use VS\Tourist\Advice\AdviceInterface;

/**
 * Class Tour
 * @package VS\Tourist
 */
class Tour
{
    /**
     * @var int
     */
    protected $personsCount;

    /**
     * @var AdviceInterface[]
     */
    protected $advices;

    public function askForPersons()
    {
        echo 'How many peoples to meet?' . PHP_EOL;
        $this->personsCount = (int)fgets(STDIN);
        if ($this->personsCount < 1 || $this->personsCount > 20) {
            throw new \InvalidArgumentException('Meet persons should be in range 1 ≤ n ≤ 20');
        }
    }

    public function askForAdvices()
    {
        $counter = 0;

        while ($this->personsCount--) {
            echo 'Advice of person ' . ++$counter . PHP_EOL;
            $partials = explode(' ', fgets(STDIN));

            if (count($partials) < 4) {
                exit('Invalid advice: Example: 30 40 start 90 walk 5');
            }

            $this->advices[] = $this->buildAdvice($partials);
        }
    }

    /**
     * @return AdviceInterface[]
     */
    public function getAdvices()
    {
        return $this->advices;
    }

    /**
     * @param $pieces
     * @return AdviceInterface
     */
    protected function buildAdvice($pieces): AdviceInterface
    {
        $result = [(float)$pieces[0], (float)$pieces[1], (float)$pieces[3]];
        $moves = [];
        $count = count($pieces);

        for ($i = 4; $i < $count; $i++) {
            if (!empty($pieces[$i+1])) {
                $moves[] = [(string)$pieces[$i], (float)$pieces[++$i]];
            }
        }

        $result[] = $moves;

        return new Advice(...$result);
    }
}