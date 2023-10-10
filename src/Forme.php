<?php

namespace Opmvpc\Formes;

abstract class Forme
{
    protected $color; // Corrected the color assignment

    public function __construct(string $color = "#000000")
    {
        $this->color = $color;
    }
    public function getCouleur(): string
    { // Assuming color is a string
        return $this->color;
    }
}
