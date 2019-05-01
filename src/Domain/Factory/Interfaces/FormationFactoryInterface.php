<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Area;
use App\Domain\Models\Formation;
use App\Domain\Models\Gallery;

interface FormationFactoryInterface
{
    /**
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param string $title
     * @param int $price
     * @param int $avalaibleSeats
     * @param string $slug
     * @param Area $area
     * @param Gallery|null $gallery
     * @return Formation
     */
    public function create(
        \DateTime $startDate,
        \DateTime $endDate,
        string $title,
        int $price,
        int $avalaibleSeats,
        string $slug,
        Area $area,
        Gallery $gallery = null
    ): Formation;
}
