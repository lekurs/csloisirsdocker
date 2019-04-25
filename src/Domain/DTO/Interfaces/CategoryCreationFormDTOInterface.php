<?php


namespace App\Domain\DTO\Interfaces;


interface CategoryCreationFormDTOInterface
{
    /**
     * CategoryCreationFormDTOInterface constructor.
     *
     * @param string $title
     */
    public function __construct(string $title);
}
