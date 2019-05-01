<?php


namespace App\Domain\DTO\Admin\Formations;


use App\Domain\DTO\Interfaces\FormationCreationFormDTOInterface;
use App\Domain\Models\Area;

final class FormationCreationFormDTO implements FormationCreationFormDTOInterface
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
     * @var string
     */
    public $slug;

    /**
     * @var Area
     */
    public $area;

    /**
     * @inheritDoc
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
