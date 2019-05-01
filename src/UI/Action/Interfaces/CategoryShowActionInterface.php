<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\UI\Responder\Interfaces\CategoryShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;

interface CategoryShowActionInterface
{
    /**
     * CategoryShowActionInterface constructor.
     *
     * @param CategoryRepositoryInterfaces $categoryRepo
     */
    public function __construct(CategoryRepositoryInterfaces $categoryRepo);

    /**
     * @param CategoryShowResponderInterface $responder
     * @return Response
     */
    public function __invoke(CategoryShowResponderInterface $responder): Response;
}
