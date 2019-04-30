<?php


namespace App\Domain\DTO\Admin\Products;


use App\Domain\DTO\Interfaces\ImageUploadFormDTOInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class ImageUploadFormDTO implements ImageUploadFormDTOInterface
{
    /**
     * @var UploadedFile
     */
    public $uploadedFile;

    /**
     * ImageUploadFormDTO constructor.
     *
     * @param UploadedFile $uploadedFile
     */
    public function __construct(UploadedFile $uploadedFile)
    {
        $this->uploadedFile = $uploadedFile;
    }
}
