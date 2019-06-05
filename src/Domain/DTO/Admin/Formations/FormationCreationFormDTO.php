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
     * @var string
     */
    public $description;

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
     * @inheritDoc
     */
    public function __construct(
        \DateTime $startDate,
        \DateTime $endDate,
        string $title,
        string $description,
        Area $area,
        int $price = null,
        int $availableSeats = null
    ) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->title = $title;
        $this->description = $description;
        $this->area = $area;
        $this->price = $price;
        $this->availableSeats = $availableSeats;
    }
}
