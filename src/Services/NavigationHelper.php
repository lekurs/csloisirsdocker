<?php


namespace App\Services;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\Services\Interfaces\NavigationHelperInterface;

final class NavigationHelper implements NavigationHelperInterface
{
    private $categoryRepo;

    /**
     * NavigationHelper constructor.
     *
     * @param $categoryRepo
     */
    public function __construct(CategoryRepositoryInterfaces $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function showNav(): array
    {
        return $this->categoryRepo->getAll();
    }
}
