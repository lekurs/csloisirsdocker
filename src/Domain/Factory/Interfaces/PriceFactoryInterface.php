<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Price;
use App\Domain\Models\Subscription;

interface PriceFactoryInterface
{
    /**
     * @param int $price
     * @param Subscription $subscription
     * @return Price
     */
    public function create(int $price, Subscription $subscription): Price;
}