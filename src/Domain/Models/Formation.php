<?php


namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;
use Symfony\Component\Validator\Constraints\Date;

class Formation
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $availableSeats;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var Area
     */
    private $area;

    /**
     * @var Gallery
     */
    private $gallery;

    /**
     * Formation constructor.
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param string $title
     * @param int $price
     * @param int $availableSeats
     * @param string $slug
     * @param Area $area
     * @param Gallery $gallery
     * @throws \Exception
     */
    public function __construct(
        \DateTime $startDate,
        \DateTime $endDate,
        string $title,
        int $price,
        int $availableSeats,
        string $slug,
        Area $area,
        Gallery $gallery = null
    ) {
        $this->id = Uuid::uuid4();
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->title = $title;
        $this->price = $price;
        $this->availableSeats = $availableSeats;
        $this->slug = $slug;
        $this->area = $area;
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
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getAvailableSeats(): int
    {
        return $this->availableSeats;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return Area
     */
    public function getArea(): Area
    {
        return $this->area;
    }

    /**
     * @return Gallery
     */
    public function getGallery(): Gallery
    {
        return $this->gallery;
    }
}
