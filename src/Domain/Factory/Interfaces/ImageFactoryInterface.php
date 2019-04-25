<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Gallery;
use App\Domain\Models\Image;
use App\Domain\Models\Product;

interface ImageFactoryInterface
{
    /**
     * @param string $path
     * @param Product|null $product
     * @param Gallery|null $gallery
     * @return Image
     */
    public function create(
        string $path,
        Product $product = null,
        Gallery $gallery = null
    ): Image;
}
