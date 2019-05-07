<?php


namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\Category;

interface ProductEditFormDTOInterface
{
    /**
     * ProductEditFormDTOInterface constructor.
     *
     * @param string $title
     * @param Category $category
     * @param string $slug
     */
    public function __construct(string $title, Category $category, string $slug);
}
