<?php


namespace App\Domain\Repository;


use App\Domain\Models\Price;
use App\Domain\Repository\Interfaces\PriceRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class PriceRepository extends ServiceEntityRepository implements PriceRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Price::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('price')
                                ->orderBy('price.price', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function save(Price $price): void
    {
        $this->_em->persist($price);
        $this->_em->flush();
    }
}