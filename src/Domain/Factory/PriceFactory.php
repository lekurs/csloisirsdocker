<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\PriceFactoryInterface;
use App\Domain\Models\Price;
use App\Domain\Models\Subscription;

class PriceFactory implements PriceFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $price, Subscription $subscription): Price
    {
        return new Price($price, $subscription);
    }
}