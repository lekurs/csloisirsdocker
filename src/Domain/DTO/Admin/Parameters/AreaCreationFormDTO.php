<?php


namespace App\Domain\DTO\Admin\Parameters;


use App\Domain\DTO\Interfaces\AreaCreationFormDTOInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class AreaCreationFormDTO implements AreaCreationFormDTOInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $address;

    /**
     * @var int
     */
    public $zip;

    /**
     * @var string
     */
    public $city;

    /**
     * @var UploadedFile
     */
    public $image;

    /**
     * AreaCreationFormDTO constructor.
     *
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     * @param UploadedFile|null $image
     */
    public function __construct(
        string $name,
        string $address,
        int $zip,
        string $city,
        UploadedFile $image = null
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->image = $image;
    }
}
