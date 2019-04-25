<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-01-29
 * Time: 20:45
 */

namespace App\Services;


use App\Services\Interfaces\ImageResizingHelperInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Filesystem\Filesystem;

class ImageResizingHelper implements ImageResizingHelperInterface
{
    /**
     * @var Filesystem
     */
    private $fileSystem;

    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * @var string
     */
    private $dirPortfolio;

    /**
     * ImageResizingHelper constructor.
     * @param Filesystem $fileSystem
     * @param SlugHelperInterface $slugHelper
     * @param string $dirPortfolio
     */
    public function __construct(Filesystem $fileSystem, SlugHelperInterface $slugHelper, string $dirPortfolio)
    {
        $this->fileSystem = $fileSystem;
        $this->slugHelper = $slugHelper;
        $this->dirPortfolio = $dirPortfolio;
    }


    /**
     * @param \SplFileInfo $image
     * @param $directory
     * @param $newName
     * @return mixed|void
     */
    public function resize(\SplFileInfo $image, $directory, $newName)
    {
        $sizeOriginal = getimagesize($image);

        $newWidth = 300; //On détermine la taille qu'on souhaite pour la nouvelle image en px

        $resize = (($newWidth * 100) / $sizeOriginal[0]); // % de réduction = au quotient de l'ancienne largeur vs newPicture

        $newHeight = (($sizeOriginal[1] * $resize) / 100); //On calcul la hauteur homotétiquement

        $newPicture = imagecreatefromjpeg($image); //Création de la nouvelle image

        $imageBackupCreation = imagecreatetruecolor($newWidth, $newHeight);

        imagecopyresampled(
            $imageBackupCreation, $newPicture, 0, 0, 0, 0, $newWidth, $newHeight, $sizeOriginal[0], $sizeOriginal[1]
        );

        if (!$this->fileSystem->exists($this->dirPortfolio . $this->slugHelper->replace($directory) . '/mini')) {
            $this->fileSystem->mkdir($this->dirPortfolio . $this->slugHelper->replace($directory) . '/mini', 0777);
        }

        imagejpeg($newPicture, $this->dirPortfolio . $this->slugHelper->replace($directory) . '/mini/' . $newName, 75);
    }
}