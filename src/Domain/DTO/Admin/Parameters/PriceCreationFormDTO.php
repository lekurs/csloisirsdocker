<?php


namespace App\Domain\DTO\Admin\Parameters;


use App\Domain\DTO\Interfaces\PriceCreationFormDTOInterface;

class PriceCreationFormDTO implements PriceCreationFormDTOInterface
{
    public $price;

    public $title;

    /**
     * PriceCreationFormDTO constructor.
     *
     * @param int $price
     * @param string $title
     */
    public function __construct(int $price, string $title)
    {
        $this->price = $price;
        $this->title = $title;
    }
}
