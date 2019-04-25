<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Gallery;

interface GalleryFactoryInterface
{
    /**
     * @param string $title
     * @return Gallery
     */
    public function create(string $title): Gallery;
}
