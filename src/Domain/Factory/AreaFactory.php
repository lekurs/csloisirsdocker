<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\AreaFactoryInterface;
use App\Domain\Models\Area;

class AreaFactory implements AreaFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(
        string $name,
        string $address,
        int $zip,
        string $city
    ): Area {
        return new Area($name, $address, $zip, $city);
    }
}
