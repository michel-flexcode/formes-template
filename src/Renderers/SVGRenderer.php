<?php

namespace Opmvpc\Formes\Renderers;

use Opmvpc\Formes\Canvas;
use Opmvpc\Formes\Rectangle;
use Opmvpc\Formes\Cercle;
use Opmvpc\Formes\Ligne;
use Opmvpc\Formes\Polygone;
use SVG\Nodes\Shapes\SVGCircle;
use SVG\Nodes\Shapes\SVGLine;
use SVG\Nodes\Shapes\SVGPolygon;
use SVG\Nodes\Shapes\SVGRect;
use SVG\SVG;

//Ceci est un package fait par qqun d'autre pour aider
class SVGRenderer implements Renderer
{
    protected Canvas $canvas;
    //-2
    private Cercle $Cercle;
    private Rectangle $Rectangle;
    // , Cercle $Cercle akjouter ?
    public function __construct(Canvas $canvas)
    {
        $this->canvas = $canvas;
    }

    public function save(string $path): void
    {
        $svgContent = $this->render();
        file_put_contents($path, $svgContent);
    }




    protected function getImage()
    {
        $image = new SVG($this->canvas->getWidth(), $this->canvas->getHeight());
        $doc = $image->getDocument();

        $square = new SVGRect(0, 0, $this->canvas->getWidth(), $this->canvas->getHeight(), $this->canvas->getCouleur());
        $doc->setStyle('fill', $this->canvas->getCouleur());
        $doc->addChild($square);

        // parcours les formes du canvas pour les ajouter
        // Iterate through the shapes in the canvas
        // alternative get class : if ($forme instanceof Rectangle)  // elseif ($formeClass === Cercle::class) 
        foreach ($this->canvas->getFormes() as $forme) {
            if ($forme instanceof Rectangle) {
                $rect = new SVGRect(
                    $forme->getPoint()->getX(),
                    $forme->getPoint()->getY(),
                    $forme->getWidth(),
                    $forme->getHeight(),
                    $forme->getCouleur()
                );
                $rect->setStyle('fill', $forme->getCouleur());
                $doc->addChild($rect);
            } elseif ($forme instanceof Cercle) {
                $cercl = new SVGCircle(
                    $forme->getCentre()->getX(),
                    $forme->getCentre()->getY(),
                    $forme->getRayon(),
                    $forme->getCouleur()
                );
                $cercl->setStyle('fill', $forme->getCouleur());
                $doc->addChild($cercl);
            } elseif ($forme instanceof Ligne) {
                $Lin = new SVGLine(
                    $forme->getPoint1()->getX(),
                    $forme->getPoint1()->getY(),
                    $forme->getPoint2()->getX(),
                    $forme->getPoint2()->getY()
                );
                $Lin->setStyle('fill', $forme->getCouleur());
                $doc->addChild($Lin);
            } elseif ($forme instanceof Polygone) {
                $PolyArray = [];
                foreach ($forme->getPoints() as $mespoints) {
                    $PolyArray[] = [$mespoints->getX(), $mespoints->getY()];
                }

                $polygon = new SVGPolygon();
                foreach ($PolyArray as $point) {
                    $polygon->addPoint($point[0], $point[1]);
                }

                $polygon->setStyle('fill', $forme->getCouleur());
                $doc->addChild($polygon);
            }
        }
        return $image;
    }

    public function render(): string
    {
        $img = $this->getImage();
        return $img->toXMLString();
    }
} 




// elseif ($formeClass === Cercle::class) {

            //     $Cercle = new SVGCircle($this->Cercle->getX(), $this->Cercle->getY(), $this->Cercle->getRayon(), $this->Cercle->getCentre(), $this->Cercle->getCouleur());
            //     $doc->setStyle('fill', $this->canvas->getCouleur());
            //     $doc->addChild($Cercle);
            // }
            

// $MonX = cercle.getCentre($this->x) return $this->x; cercle->getCentre->this->x
//                 $MonY = cercle.getCentre()[1]
//                     $MonR = cercle.getRayon();
    // public function getRayon(): ?string
    // {
    //     return $this->getAttribute('rayon');
    // }