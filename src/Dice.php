<?php

namespace App;

class Dice implements RandomObject{
    private $faces;

    public function __construct()
    {
        $this->faces = [1, 2, 3, 4, 5, 6];
    }

    public function roll(): int
    {
        return $this->faces[array_rand($this->faces)];
    }
}
