<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\FormationFactoryInterface;
use App\Domain\Models\Area;
use App\Domain\Models\Formation;
use App\Domain\Models\Gallery;

final class FormationFactory implements FormationFactoryInterface
{
    public function create(
        \DateTime $startDate,
        \DateTime $endDate,
        string $title,
        int $price,
        int $avalaibleSeats,
        Area $area,
        Gallery $gallery = null
    ): Formation {
        return new Formation($startDate, $endDate, $title, $price, $avalaibleSeats, $area, $gallery);
    }
}
