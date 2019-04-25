<?php


namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class Price
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var int
     */
    private $price;

    /**
     * @var Subscription
     */
    private $subscription;

    /**
     * Price constructor.
     *
     * @param int $price
     * @param Subscription $subscription
     * @throws \Exception
     */
    public function __construct(
        int $price,
        Subscription $subscription
    ) {
        $this->id = Uuid::uuid4();
        $this->price = $price;
        $this->subscription = $subscription;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return Subscription
     */
    public function getSubscription(): Subscription
    {
        return $this->subscription;
    }
}
