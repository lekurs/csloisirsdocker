<?php


namespace App\Domain\Repository;


use App\Domain\Models\Product;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ProductRepository extends ServiceEntityRepository implements ProductRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('product')
                                ->leftJoin('product.category', 'category')
                                ->orderBy('category.category', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function getOneBySlug($slug): Product
    {
        return $this->createQueryBuilder('product')
                                ->where('product.slug = :slug')
                                ->setParameter('slug', $slug)
                                ->getQuery()
                                ->getOneOrNullResult();
    }

    public function save(Product $product): void
    {
        $this->_em->persist($product);
        $this->_em->flush();
    }

    public function edit(): void
    {
        $this->_em->flush();
    }
}
