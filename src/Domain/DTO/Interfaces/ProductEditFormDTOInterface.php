<?php


namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\Category;

interface ProductEditFormDTOInterface
{
    /**
     * ProductEditFormDTOInterface constructor.
     *
     * @param string $title
     * @param string $description
     * @param Category $category
     * @param string $slug
     */
    public function __construct(string $title, string $description, Category $category, string $slug);
}
