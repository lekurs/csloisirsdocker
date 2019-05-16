<?php


namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\Image;

interface ImageRepositoryInterface
{
    /**
     * @param $id
     * @return Image
     */
    public function getOneById($id): Image;

    /**
     * @param Image $image
     */
    public function setMainImage(Image $image): void;
}
