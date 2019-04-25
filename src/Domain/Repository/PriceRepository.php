<?php


namespace App\Domain\Repository;


use App\Domain\Models\Price;
use App\Domain\Repository\Interfaces\PriceRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class PriceRepository extends ServiceEntityRepository implements PriceRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Price::class);
    }
}