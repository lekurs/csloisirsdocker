<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Price;

interface PriceFactoryInterface
{
    /**
     * @param int $price
     * @param string $title
     * @return Price
     */
    public function create(int $price, string $title): Price;
}