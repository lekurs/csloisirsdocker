<?php


namespace App\Domain\DTO\Admin\Formations;


use App\Domain\DTO\Interfaces\FormationEditFormDTOInterface;
use App\Domain\Models\Area;

final class FormationEditFormDTO implements FormationEditFormDTOInterface
{
    /**
     * @var \DateTime
     */
    public $startDate;

    /**
     * @var \DateTime
     */
    public $endDate;

    /**
     * @var string
     */
    public $title;

    /**
     * @var int
     */
    public $price;

    /**
     * @var int
     */
    public $availableSeats;

    /**
     * @var Area
     */
    public $area;

    /**
     * @var string
     */
    public $slug;

    /**
     * FormationEditFormDTO constructor.
     *
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param string $title
     * @param Area $area
     * @param string $slug
     * @param int|null $price
     * @param int|null $availableSeats
     */
    public function __construct(
        \DateTime $startDate,
        \DateTime $endDate,
        string $title,
        Area $area,
        string $slug,
        int $price = null,
        int $availableSeats = null
    ) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->title = $title;
        $this->area = $area;
        $this->slug = $slug;
        $this->price = $price;
        $this->availableSeats = $availableSeats;
    }
}