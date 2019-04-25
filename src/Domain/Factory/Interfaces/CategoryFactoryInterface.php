<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Category;

interface CategoryFactoryInterface
{
    /**
     * @param string $title
     * @param string $slug
     * @return Category
     */
    public function create(string $title, string $slug): Category;
}