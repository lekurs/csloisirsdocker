<?php


namespace App\Domain\Repository;


use App\Domain\Models\Formation;
use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class FormationRepository extends ServiceEntityRepository implements FormationRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formation::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('formation')
                                ->getQuery()
                                ->getResult();
    }

    public function getOneById($id): Formation
    {
        return $this->createQueryBuilder('formation')
                                ->where('formation.id = :id')
                                ->setParameter('id', $id)
                                ->getQuery()
                                ->getOneOrNullResult();
    }

    public function save(Formation $formation): void
    {
        $this->_em->persist($formation);
        $this->_em->flush();
    }

    public function edit(): void
    {
        $this->_em->flush();
    }
}