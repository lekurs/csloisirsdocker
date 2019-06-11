<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Area;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface AreaFactoryInterface
{
    /**
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     * @param string|null $path
     * @return Area
     */
    public function create(
        string $name,
        string $address,
        int $zip,
        string $city,
        string $path= null
    ): Area;
}