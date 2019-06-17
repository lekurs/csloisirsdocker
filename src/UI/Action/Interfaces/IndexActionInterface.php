<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\Services\Interfaces\NavigationHelperInterface;
use App\UI\Responder\Interfaces\IndexResponderInterface;
use Symfony\Component\HttpFoundation\Response;

interface IndexActionInterface
{
    /**
     * IndexActionInterface constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     * @param CategoryRepositoryInterfaces $categoryRepo
     * @param NavigationHelperInterface $navHelper
     */
    public function __construct(
        FormationRepositoryInterface $formationRepo,
        CategoryRepositoryInterfaces $categoryRepo,
        NavigationHelperInterface $navHelper
    );

    /**
     * @param IndexResponderInterface $responder
     * @return Response
     */
    public function __invoke(IndexResponderInterface $responder): Response;
}
