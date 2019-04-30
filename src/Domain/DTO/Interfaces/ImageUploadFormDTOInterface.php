<?php


namespace App\Domain\DTO\Interfaces;


use Symfony\Component\HttpFoundation\File\UploadedFile;

interface ImageUploadFormDTOInterface
{
    /**
     * ImageUploadFormDTOInterface constructor.
     *
     * @param UploadedFile $uploadedFile
     */
    public function __construct(UploadedFile $uploadedFile);
}
