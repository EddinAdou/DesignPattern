<?php

namespace App;

class Coin implements RandomObject
{
    private $numberOfFlips;

    public function __construct(int $numberOfFlips)
    {
        $this->numberOfFlips = $numberOfFlips;
    }

    public function roll(): int
    {
        $result = 0;

        for ($i = 0; $i < $this->numberOfFlips; $i++) {
            $result += rand(0, 1);
        }

        return $result % 2;
    }
}
