<?php


namespace App\Domain\DTO\Admin\Products;


use App\Domain\DTO\Interfaces\ProductEditFormDTOInterface;
use App\Domain\Models\Category;

final class ProductEditFormDTO implements ProductEditFormDTOInterface
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
     * @var string
     */
    public $slug;

    /**
     * ProductEditFormDTO constructor.
     *
     * @param string $title
     * @param Category $category
     * @param string $slug
     */
    public function __construct(string $title, Category $category, string $slug)
    {
        $this->title = $title;
        $this->category = $category;
        $this->slug = $slug;
    }
}
