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
     * Image constructor.
     *
     * @param string $path
     * @param Product|null $product
     * @param Gallery|null $gallery
     * @throws \Exception
     */
    public function __construct(
        string $path,
        Product $product = null,
        Gallery $gallery = null
    ) {
        $this->id = Uuid::uuid4();
        $this->path = $path;
        $this->product = $product;
        $this->gallery = $gallery;
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
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @return Gallery
     */
    public function getGallery(): Gallery
    {
        return $this->gallery;
    }
}
