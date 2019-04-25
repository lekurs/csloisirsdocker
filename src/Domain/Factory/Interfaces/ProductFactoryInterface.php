<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Category;
use App\Domain\Models\Product;

interface ProductFactoryInterface
{
    /**
     * @param string $title
     * @param Category $category
     * @param string $slug
     * @return Product
     */
    public function create(string $title, Category $category, string $slug): Product;
}