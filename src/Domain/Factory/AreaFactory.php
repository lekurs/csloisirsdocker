<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\AreaFactoryInterface;
use App\Domain\Models\Area;

final class AreaFactory implements AreaFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(
        string $name,
        string $address,
        int $zip,
        string $city,
        string $path= null
    ): Area {
        return new Area($name, $address, $zip, $city, $path);
    }
}
