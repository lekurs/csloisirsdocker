<?php


namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class Price
{
    private $id;

    private $price;

    private $title;

    /**
     * Price constructor.
     *
     * @param int $price
     * @param string $title
     * @throws \Exception
     */
    public function __construct(
        int $price,
        string $title
    ) {
        $this->id = Uuid::uuid4();
        $this->price = $price;
        $this->title = $title;
    }

    /**
     * @return Uuid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
