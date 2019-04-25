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
}