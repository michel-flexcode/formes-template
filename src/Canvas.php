<?php

namespace Opmvpc\Formes;

class Canvas extends Forme
{
    private float $width;
    private float $height;
    private array $formes;

    // array $formes = []  ----->  si on ne déclare pas array $formes ---> problem il sait pas fonctionner
    public function __construct(float $width, float $height, array $formes = [], string $color = "#FFFFFF")
    {
        parent::__construct($color); // Appel du constructeur de la classe parente
        $this->width = $width;
        $this->height = $height;
        $this->formes = [];
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getFormes(): array
    { // Added this method to get the height
        return $this->formes;
    }

    public function add(Forme $forme): void
    {
        $this->formes[] = $forme;
    }
}
