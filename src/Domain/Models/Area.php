<?php


namespace App\Domain\Models;


use App\Domain\DTO\Admin\Parameters\AreaCreationFormDTO;
use Ramsey\Uuid\Uuid;

class Area
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var int
     */
    private $zip;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $image;

    /**
     * @var \ArrayAccess
     */
    private $formations;

    /**
     * Area constructor.
     *
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     * @param string $image
     * @throws \Exception
     */
    public function __construct(
        string $name,
        string $address,
        int $zip,
        string $city,
        string $image
    ) {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->image = $image;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return int
     */
    public function getZip(): int
    {
        return $this->zip;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return \ArrayAccess
     */
    public function getFormations(): \ArrayAccess
    {
        return $this->formations;
    }

    /**
     * @return string|null
     */
    public function getImage(): ? string
    {
        return $this->image;
    }

    public function edit(AreaCreationFormDTO $DTO): void
    {
        $this->name = $DTO->name;
        $this->address = $DTO->address;
        $this->zip = $DTO->zip;
        $this->city = $DTO->city;
    }
}
