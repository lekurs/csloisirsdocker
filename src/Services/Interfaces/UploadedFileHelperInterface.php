<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 12/10/2018
 * Time: 08:57
 */

namespace App\Services\Interfaces;


use App\Domain\Models\Product;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface UploadedFileHelperInterface
{
    /**
     * UploadedFileHelperInterface constructor.
     *
     * @param string $dirPortfolio
     * @param SlugHelperInterface $slugHelper
     * @param Filesystem $fileSystem
     */
    public function __construct(
        string $dirPortfolio,
        SlugHelperInterface $slugHelper,
        Filesystem $fileSystem
    );

    /**
     * @param UploadedFile $file
     * @return mixed
     */
    public function rename(UploadedFile $file): string ;

    /**
     * @param UploadedFile $file
     * @return mixed
     */
    public function move(UploadedFile $file);

    /**
     * @param UploadedFile $file
     */
    public function movePicto(UploadedFile $file): void;
}
