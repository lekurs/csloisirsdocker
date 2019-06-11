<?php


namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class Image
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $path;

    /**
     * @var Product
     */
    private $product;

    /**
     * @var Gallery
     */
    private $gallery;

    /**
     * @var bool
     */
    private $main;

    /**
     * Image constructor.
     *
     * @param string $path
     * @param Product|null $product
     * @param Gallery|null $gallery
     * @param bool $main
     * @throws \Exception
     */
    public function __construct(
        string $path,
        Product $product = null,
        Gallery $gallery = null,
        bool $main = false
    ) {
        $this->id = Uuid::uuid4();
        $this->path = $path;
        $this->product = $product;
        $this->gallery = $gallery;
        $this->main = $main;
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
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return Product
     */
    public function getProduct(): ? Product
    {
        return $this->product;
    }

    /**
     * @return Gallery
     */
    public function getGallery(): ? Gallery
    {
        return $this->gallery;
    }

    /**
     * @return bool
     */
    public function isMain(): bool
    {
        return $this->main;
    }

    public function addProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function updateMainImage(bool $favorite): void
    {
        $this->main = $favorite;
    }
}
