<?php


namespace App\Domain\DTO\Admin\Parameters;


use App\Domain\DTO\Interfaces\CategoryCreationFormDTOInterface;

final class CategoryCreationFormDTO implements CategoryCreationFormDTOInterface
{
    /**
     * @var string
     */
    public $title;

    /**
     * CategoryCreationFormDTO constructor.
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }
}
