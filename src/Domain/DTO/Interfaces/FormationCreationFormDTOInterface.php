<?php


namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\Area;

interface FormationCreationFormDTOInterface
{
    /**
     * FormationCreationFormDTOInterface constructor.
     *
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param string $title
     * @param string $description
     * @param Area $area
     * @param int|null $price
     * @param int|null $availableSeats
     */
    public function __construct(
        \DateTime $startDate,
        \DateTime $endDate,
        string $title,
        string $description,
        Area $area,
        int $price = null,
        int $availableSeats = null
    );
}
