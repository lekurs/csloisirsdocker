<?php


namespace App\Domain\DTO\Interfaces;


use Symfony\Component\HttpFoundation\File\UploadedFile;

interface AreaCreationFormDTOInterface
{
    /**
     * AreaCreationFormDTOInterface constructor.
     *
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     * @param string $image
     */
    public function __construct(
        string $name,
        string $address,
        int $zip,
        string $city,
        UploadedFile $image = null
    );
}
