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
    );
}
