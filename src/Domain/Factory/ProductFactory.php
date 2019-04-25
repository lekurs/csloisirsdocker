<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\ProductFactoryInterface;
use App\Domain\Models\Category;
use App\Domain\Models\Product;

final class ProductFactory implements ProductFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $title, Category $category, string $slug): Product
    {
        return new Product($title, $category, $slug);
    }
}
