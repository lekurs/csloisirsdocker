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
     * @var string
     */
    public $description;

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
     * @inheritDoc
     */
    public function __construct(string $title, string $description, Category $category, string $slug)
    {
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->slug = $slug;
    }
}
