<?php

namespace Opmvpc\Formes;

class Rectangle extends Forme
{
    private point $point;
    private float $width;
    private float $height;

    public function __construct(point $point, float $width, float $height, string $color = "#000000")
    {
        parent::__construct($color); // Appel du constructeur de la classe parente
        $this->point = $point;
        $this->width = $width;
        $this->height = $height;
    }

    public function getPoint(): point
    {
        return $this->point;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getWidth(): float
    {
        return $this->width;
    }
}
