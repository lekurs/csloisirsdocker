<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 12/10/2018
 * Time: 08:57
 */

namespace App\Services;


use App\Domain\Models\Client;
use App\Domain\Models\Product;
use App\Services\Interfaces\SlugHelperInterface;
use App\Services\Interfaces\UploadedFileHelperInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadedFileHelper implements UploadedFileHelperInterface
{
    /**
     * @var string
     */
    private $dirImages;

    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * @var Filesystem
     */
    private $fileSystem;

    /**
     * UploadedFileHelper constructor.
     *
     * @param string $dirImages
     * @param SlugHelperInterface $slugHelper
     * @param Filesystem $fileSystem
     */
    public function __construct(
        string $dirImages,
        SlugHelperInterface $slugHelper,
        Filesystem $fileSystem
    ) {
        $this->dirImages = $dirImages;
        $this->slugHelper = $slugHelper;
        $this->fileSystem = $fileSystem;
    }

    /**
     * @param UploadedFile $file
     * @return string|null
     */
    public function rename(UploadedFile $file): string
    {
        return $file->getClientOriginalName();
    }


    /**
     * @param UploadedFile $file
     */
    public function move(UploadedFile $file): void
    {
        if (!$this->fileSystem->exists($this->dirImages)){

            $this->fileSystem->mkdir($this->dirImages, 0777);
        }

        $file->move($this->dirImages, $file->getClientOriginalName());
    }

    public function movePicto(UploadedFile $file): void
    {
//        if (!$this->fileSystem->exists($this->dirTechnoPicto)) {
//            $this->fileSystem->mkdir($this->dirTechnoPicto, 0777);
//        }
//
//        $file->move($this->dirTechnoPicto, $file->getClientOriginalName());
    }
}
