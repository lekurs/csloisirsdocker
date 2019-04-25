<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Area;

interface AreaFactoryInterface
{
    /**
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     * @return Area
     */
    public function create(
        string $name,
        string $address,
        int $zip,
        string $city
    ): Area;
}