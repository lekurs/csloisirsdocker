<?php


namespace App\Domain\Models;


use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;

class Product
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var Category
     */
    private $category;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \ArrayAccess
     */
    private $images;

    /**
     * Product constructor.
     *
     * @param string $title
     * @param Category $category
     * @param array $images
     * @param string $slug
     * @throws \Exception
     */
    public function __construct(string $title, Category $category, array $images, string $slug)
    {
        $this->id = Uuid::uuid4();
        $this->title = $title;
        $this->category = $category;
        $this->images = new ArrayCollection($images ?? []);
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
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
    public function getImages(): \ArrayAccess
    {
        return $this->images;
    }
}
