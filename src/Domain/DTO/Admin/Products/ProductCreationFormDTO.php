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
     * @var string
     */
    public $description;

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
     * @param string $description
     * @param Category $category
     * @param array $images
     */
    public function __construct(
        string $title,
        string $description,
        Category $category,
        array $images = []
    ){
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->images = $images;
    }
}
