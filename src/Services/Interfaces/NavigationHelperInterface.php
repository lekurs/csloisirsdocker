<?php


namespace App\Services\Interfaces;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;

interface NavigationHelperInterface
{
    /**
     * NavigationHelperInterface constructor.
     *
     * @param CategoryRepositoryInterfaces $categoryRepo
     */
    public function __construct(CategoryRepositoryInterfaces $categoryRepo);

    /**
     * @return array
     */
    public function showNav(): array;
}
