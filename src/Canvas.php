<?php

namespace Opmvpc\Formes;

class Canvas extends Forme
{
    private float $width;
    private float $height;
    private array $formes;

    // array $formes = []  ----->  si on ne déclare pas array $formes ---> problem il sait pas fonctionner
    //array $formes = [], mais il faut pas initialiser ce array dans le canva, il est censé être vide 
    public function __construct(float $width, float $height, string $color = "#FFFFFF")
    {

        $this->width = $width;
        $this->height = $height;
        $this->formes = [];
        parent::__construct($color); // Appel du constructeur de la classe parente
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

    //    public function add(Rectangle|Cercle|Ligne $forme): void
    public function add(Forme $forme): void
    {
        $this->formes[] = $forme;
    }
}
