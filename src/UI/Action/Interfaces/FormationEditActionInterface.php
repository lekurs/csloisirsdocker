<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\FormationEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\UI\Responder\Interfaces\FormationEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface FormationEditActionInterface
{
    /**
     * FormationEditActionInterface constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     * @param FormFactoryInterface $formFactory
     * @param FormationEditFormHandlerInterface $formationEditFormHandler
     */
    public function __construct(
        FormationRepositoryInterface $formationRepo,
        FormFactoryInterface $formFactory,
        FormationEditFormHandlerInterface $formationEditFormHandler
    );

    /**
     * @param Request $request
     * @param FormationEditResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, FormationEditResponderInterface $responder): Response;
}
