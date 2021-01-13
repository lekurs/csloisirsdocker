<?php


namespace App\Domain\Repository;


use App\Domain\Models\Category;
use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CategoryRepository extends ServiceEntityRepository implements CategoryRepositoryInterfaces
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        return $this->createQueryBuilder('category')
                                ->orderBy('category.category', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function getOne($id): Category
    {
        return $this->createQueryBuilder('category')
                                ->where('category.id = :id')
                                ->setParameter('id', $id)
                                ->getQuery()
                                ->getOneOrNullResult();
    }

    public function getOneBySlug($slug): Category
    {
        return $this->createQueryBuilder('category')
            ->where('category.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function save(Category $category): void
    {
        $this->_em->persist($category);
        $this->_em->flush();
    }

    public function edit(): void
    {
        $this->_em->flush();
    }

    public function delete(Category $category): void
    {
        $this->_em->remove($category);
        $this->_em->flush();
    }
}