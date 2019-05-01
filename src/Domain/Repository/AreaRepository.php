<?php


namespace App\Domain\Repository;


use App\Domain\Models\Area;
use App\Domain\Repository\Interfaces\AreaRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class AreaRepository extends ServiceEntityRepository implements AreaRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Area::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('area')
                                ->orderBy('area.name', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function getOneById($id): Area
    {
        return $this->createQueryBuilder('area')
                                ->where('area.id = :id')
                                ->setParameter('id', $id)
                                ->getQuery()
                                ->getOneOrNullResult();
    }

    public function save(Area $area): void
    {
        $this->_em->persist($area);
        $this->_em->flush();
    }

    public function edit(): void
    {
        $this->_em->flush();
    }
}