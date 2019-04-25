<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 12/10/2018
 * Time: 08:57
 */

namespace App\Services;


use App\Domain\Models\Client;
use App\Services\Interfaces\SlugHelperInterface;
use App\Services\Interfaces\UploadedFileHelperInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadedFileHelper implements UploadedFileHelperInterface
{
    /**
     * @var string
     */
    private $dirPortfolio;

    /**
     * @var string
     */
    private $dirTechnoPicto;

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
     * @param string $dirPortfolio
     * @param string $dirTechnoPicto
     * @param SlugHelperInterface $slugHelper
     * @param Filesystem $fileSystem
     */
    public function __construct(
        string $dirPortfolio,
        string $dirTechnoPicto,
        SlugHelperInterface $slugHelper,
        Filesystem $fileSystem
    ) {
        $this->dirPortfolio = $dirPortfolio;
        $this->dirTechnoPicto = $dirTechnoPicto;
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
     * @param Client $client
     */
    public function move(UploadedFile $file, Client $client): void
    {
        if (!$this->fileSystem->exists($this->dirPortfolio . $this->slugHelper->replace($client->getName()))) {

            $this->fileSystem->mkdir($this->dirPortfolio . $this->slugHelper->replace($client->getName()), 0777);
        }

        $file->move($this->dirPortfolio . $this->slugHelper->replace($client->getName()), $file->getClientOriginalName());
    }

    public function movePicto(UploadedFile $file): void
    {
        if (!$this->fileSystem->exists($this->dirTechnoPicto)) {
            $this->fileSystem->mkdir($this->dirTechnoPicto, 0777);
        }

        $file->move($this->dirTechnoPicto, $file->getClientOriginalName());
    }
}
