<?php


namespace App\Domain\DTO\Admin\Parameters;


use App\Domain\DTO\Interfaces\AreaFormDTOInterface;

final class AreaFormDTO implements AreaFormDTOInterface
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
     * AreaFormDTO constructor.
     *
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     */
    public function __construct(
        string $name,
        string $address,
        int $zip,
        string $city
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
    }
}
