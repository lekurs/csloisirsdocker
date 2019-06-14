<?php


namespace App\Domain\DTO\Interfaces;


interface PriceCreationFormDTOInterface
{
    /**
     * PriceCreationFormDTOInterface constructor.
     *
     * @param int $price
     * @param string $title
     */
    public function __construct(int $price, string $title);
}
