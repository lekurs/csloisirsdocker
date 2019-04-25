<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\SubscriptionFactoryInterface;
use App\Domain\Models\Subscription;

final class SubscriptionFactory implements SubscriptionFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $title): Subscription
    {
        return new Subscription($title);
    }
}
