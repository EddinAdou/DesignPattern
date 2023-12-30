<?php

namespace App;

use App\Dice;

class DiceAdapter implements RandomObject
{
    private $dice;

    public function __construct(Dice $dice)
    {
        $this->dice = $dice;
    }

    public function roll()
    {
        return $this->dice->roll();
    }
}
