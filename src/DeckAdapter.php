<?php

namespace App;
use App\Deck;

class DeckAdapter implements RandomObject
{
    private $deck;

    public function __construct(Deck $deck)
    {
        $this->deck = $deck;
    }

    public function roll()
    {
        return $this->deck->roll();
    }
}
