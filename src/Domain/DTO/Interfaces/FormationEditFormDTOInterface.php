<?php


namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\Area;

interface FormationEditFormDTOInterface
{
    /**
     * FormationEditFormDTOInterface constructor.
     *
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param string $title
     * @param string $description
     * @param Area $area
     * @param string $slug
     * @param int|null $price
     * @param int|null $availableSeats
     */
    public function __construct(
        \DateTime $startDate,
        \DateTime $endDate,
        string $title,
        string $description,
        Area $area,
        string $slug,
        int $price = null,
        int $availableSeats = null
    );
}