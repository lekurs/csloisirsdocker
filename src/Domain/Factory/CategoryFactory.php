<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\CategoryFactoryInterface;
use App\Domain\Models\Category;

final class CategoryFactory implements CategoryFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $title, string $slug): Category
    {
        return new Category($title, $slug);
    }
}
