<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Subscription;

interface SubscriptionFactoryInterface
{
    /**
     * @param string $title
     * @return Subscription
     */
    public function create(string $title): Subscription;
}
