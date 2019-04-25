<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\ImageFactoryInterface;
use App\Domain\Models\Gallery;
use App\Domain\Models\Image;
use App\Domain\Models\Product;

final class ImageFactory implements ImageFactoryInterface
{
    /**
     * @param string $path
     * @param Product|null $product
     * @param Gallery|null $gallery
     * @return Image
     * @throws \Exception
     */
    public function create(
        string $path,
        Product $product = null,
        Gallery $gallery = null
    ): Image {
        return new Image($path, $product, $gallery);
    }
}
