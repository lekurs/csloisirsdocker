<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\GalleryFactoryInterface;
use App\Domain\Models\Gallery;

class GalleryFactory implements GalleryFactoryInterface
{
    /**
     * @param string $title
     * @return Gallery
     * @throws \Exception
     */
    public function create(string $title): Gallery
    {
        return new Gallery($title);
    }
}
