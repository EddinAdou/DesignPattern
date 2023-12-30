<?php

namespace App;

class Deck implements RandomObject
{
    private $colors;
    private $values;

    public function __construct(array $colors, array $values)
    {
        $this->colors = $colors;
        $this->values = $values;
    }

    public function roll(): int
    {
        $color = rand(0, count($this->colors) - 1);
        $value = rand(0, count($this->values) - 1);

        return $color * count($this->values) + $value + 1;
    }
}
