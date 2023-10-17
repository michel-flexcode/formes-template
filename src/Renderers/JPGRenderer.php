<?php

namespace Opmvpc\Formes\Renderers;

class JPGRenderer extends SVGRenderer implements Renderer
{
    public function save(string $path): void
    {
        $img = $this->getImage();
        $rasterImage = $img->toRasterImage($this->canvas->getWidth(), $this->canvas->getHeight());
        imagejpeg($rasterImage, $path);
    }
}


// 200 EN DUR
//  public function save(string $path): void
//     {
//         $img = $this->getImage();
//         $rasterImage = $img->toRasterImage(200, 200);
//         imagejpeg($rasterImage, $path);
//     }