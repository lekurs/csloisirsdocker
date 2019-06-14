<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\PriceFactoryInterface;
use App\Domain\Models\Price;

class PriceFactory implements PriceFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $price, string $title): Price
    {
        return new Price($price, $title);
    }
}
