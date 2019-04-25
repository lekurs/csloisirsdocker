<?php


namespace App\Domain\Models;


use App\Domain\DTO\Admin\Parameters\CategoryCreationFormDTO;
use Ramsey\Uuid\Uuid;

class Category
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \ArrayAccess
     */
    private $products;

    /**
     * Category constructor.
     *
     * @param string $category
     * @param string $slug
     * @throws \Exception
     */
    public function __construct(string $category, string $slug)
    {
        $this->id = Uuid::uuid4();
        $this->category = $category;
        $this->slug = $slug;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return \ArrayAccess
     */
    public function getProducts(): \ArrayAccess
    {
        return $this->products;
    }

    public function manageCategory(string $category, string $slug)
    {
        $this->category = $category;
        $this->slug = $slug;
    }
}
