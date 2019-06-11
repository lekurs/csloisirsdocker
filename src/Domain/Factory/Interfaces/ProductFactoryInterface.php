<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Category;
use App\Domain\Models\Product;

interface ProductFactoryInterface
{
    /**
     * @param string $title
     * @param string $description
     * @param Category $category
     * @param array $images
     * @param string $slug
     * @return Product
     */
    public function create(string $title, string $description, Category $category, array $images, string $slug): Product;
}