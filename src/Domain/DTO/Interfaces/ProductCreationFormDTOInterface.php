<?php


namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\Category;

interface ProductCreationFormDTOInterface
{
    /**
     * ProductCreationFormDTOInterface constructor.
     *
     * @param string $title
     * @param string $description
     * @param Category $category
     * @param array $images
     */
    public function __construct(
        string $title,
        string $description,
        Category $category,
        array $images = []
    );
}
