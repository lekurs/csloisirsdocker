<?php


namespace App\Domain\DTO\Admin\Products;


use App\Domain\DTO\Interfaces\ProductCreationFormDTOInterface;
use App\Domain\Models\Category;

final class ProductCreationFormDTO implements ProductCreationFormDTOInterface
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var Category
     */
    public $category;

    /**
     * @var array
     */
    public $images;

    /**
     * ProductCreationFormDTO constructor.
     *
     * @param string $title
     * @param Category $category
     */
    public function __construct(string $title, Category $category, array $images = [])
    {
        $this->title = $title;
        $this->category = $category;
        $this->images = $images;
    }
}
