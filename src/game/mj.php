<?php
namespace entity;

class Mj
{
    private $decks;
    private $coins;
    private $dice;

    public function __construct(array $decks, array $coins, array $dice)
    {
        $this->decks = $decks;
        $this->coins = $coins;
        $this->dice = $dice;
    }

    public function rollForCrit($critRate)
    {
        $randomObject = $this->getRandomObject();
        $value = $randomObject->roll();

        return $value > $critRate;
    }

    private function getRandomObject()
    {
        return $this->decks[array_rand($this->decks)] ??
            $this->coins[array_rand($this->coins)] ??
            $this->dice[array_rand($this->dice)];
    }
}

namespace App;

class Deck
{
    private $cards;

    public function __construct(array $cards)
    {
        $this->cards = $cards;
    }

    public function roll()
    {
        return $this->cards[array_rand($this->cards)]->getValue();
    }
}

namespace App;

class Coin
{
    private $numberLaunches;

    public function __construct($numberLaunches = 1)
    {
        $this->numberLaunches = $numberLaunches;
    }

    public function roll()
    {
        return rand(0, 1) == 1 ? 1 : 0;
    }

    public function isCrit()
    {
        return $this->roll() == 1;
    }

    public function rollXTimes()
    {
        if ($this->numberLaunches <= 0) {
            return false;
        }

        return $this->isCrit() ? $this->rollXTimes($this->numberLaunches - 1) : false;
    }
}

namespace App;

class Dice
{
    private $faces;

    public function __construct($faces)
    {
        $this->faces = $faces;
    }

    public function roll()
    {
        return rand(1, $this->faces);
    }
}
