<?php


namespace App\Domain\DTO\Interfaces;


interface AreaFormDTOInterface
{
    /**
     * AreaFormDTOInterface constructor.
     *
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     */
    public function __construct(
        string $name,
        string $address,
        int $zip,
        string $city
    );
}
