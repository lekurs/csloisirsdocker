<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\AreaEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\AreaRepositoryInterface;
use App\UI\Responder\Interfaces\AreaEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface AreaEditActionInterface
{
    /**
     * AreaEditActionInterface constructor.
     *
     * @param AreaRepositoryInterface $areaRepo
     * @param AreaEditFormHandlerInterface $areaEditHandler
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        AreaRepositoryInterface $areaRepo,
        AreaEditFormHandlerInterface $areaEditHandler,
        FormFactoryInterface $formFactory
    );

    /**
     * @param Request $request
     * @param AreaEditResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, AreaEditResponderInterface $responder): Response;
}
