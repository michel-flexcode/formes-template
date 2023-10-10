<?php

namespace Opmvpc\Formes;

class Ligne extends Forme
{
    private point $point1;
    private point $point2;

    public function __construct(point $point1, point $point2, string $color = "#000000")
    {
        parent::__construct($color); // Appel du constructeur de la classe parente
        $this->point1 = $point1;
        $this->point2 = $point2;
    }

    public function getPoint1(): point
    {
        return $this->point1;
    }

    public function getPoint2(): point
    {
        return $this->point2;
    }
}
