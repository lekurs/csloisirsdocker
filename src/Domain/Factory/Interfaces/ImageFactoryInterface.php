<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Area;
use App\Domain\Models\Gallery;
use App\Domain\Models\Image;
use App\Domain\Models\Product;

interface ImageFactoryInterface
{
    /**
     * @param string $path
     * @param Product|null $product
     * @param Gallery|null $gallery
     * @param bool $main
     * @param Area|null $area
     * @return Image
     */
    public function create(
        string $path,
        Product $product = null,
        Gallery $gallery = null,
        bool $main = false,
        Area $area = null
    ): Image;
}
