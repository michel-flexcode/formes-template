<?php

namespace Opmvpc\Formes;

class Cercle extends Forme
{
    private float $rayon;
    // typé de la classe point
    private Point $point;

    public function __construct(Point $point, float $rayon, string $color = "#000000")
    {
        $this->rayon = $rayon;
        $this->point = $point;
        parent::__construct($color);
    }


    public function getRayon(): float
    { // Assuming rayon is a float
        return $this->rayon;
    }
    //Non nécessaire car existe dans forme
    // public function getCouleur(): string { // Assuming color is a string
    //     return $this->color;
    // }

    public function getCentre(): point
    { // Assuming point is a string
        return $this->point;
    }

    // public function calculerAire()
    // {
    //     return pi() * pow($this->rayon, 2);
    // }

    // public function calculerPerimetre()
    // {
    //     return 2 * pi() * $this->rayon;
    // }

    // public function generateSVG()
    // {
    //     $svg = '<circle cx="' . $this->rayon . '" cy="' . $this->rayon . '" r="' . $this->rayon . '" fill="none" stroke="' . $this->color . '" />';
    //     return $svg;
    // }
}
