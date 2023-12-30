<?php

namespace App;

class Mj
{
    private $randomObjects;
    private $lastRollValue;

    public function __construct(iterable $randomObjects)
    {
        $this->randomObjects = $randomObjects;
    }

    public function rollForCrit(int $critRate): bool
    {
        $randomObject = $this->randomObjects[rand(0, count($this->randomObjects) - 1)];
        $this->lastRollValue = $randomObject->roll();

        return $this->lastRollValue >= $critRate;
    }

    public function getRollValue(): ?int
    {
        return $this->lastRollValue;
    }
}
