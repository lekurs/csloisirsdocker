<?php


namespace App\Domain\Repository;


use App\Domain\Models\Image;
use App\Domain\Models\Product;
use App\Domain\Repository\Interfaces\ImageRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class ImageRepository extends ServiceEntityRepository implements ImageRepositoryInterface
{
    /**
     * ImageRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Image::class);
    }

    public function getOneById($id): Image
    {
        return $this->createQueryBuilder('image')
                                ->where('image.id = :id')
                                ->setParameter('id', $id)
                                ->getQuery()
                                ->getOneOrNullResult();
    }

    public function edit(): void
    {
        $this->_em->flush();
    }

    public function setMainImage(Image $image): void
    {
        if ($image->isMain() == false) {
            $image->updateMainImage(true);
        } else {
            $image->updateMainImage(false);
        }

        $this->_em->flush();
    }

    public function removeImage(Image $image): void
    {
        $this->_em->remove($image);
        $this->_em->flush();
    }

    public function addOne(Image $image, Product $product): void
    {
        $product->addImage($image);
        $this->_em->persist($image);
        $this->_em->flush();
    }
}
