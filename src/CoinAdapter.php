<?php

namespace App;

use App\Coin;

class CoinAdapter implements RandomObject
{
    private $coin;

    public function __construct(Coin $coin)
    {
        $this->coin = $coin;
    }

    public function roll()
    {
        return $this->coin->roll();
    }
}
