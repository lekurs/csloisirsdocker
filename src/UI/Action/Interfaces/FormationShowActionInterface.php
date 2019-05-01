<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\UI\Responder\Interfaces\FormationShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface FormationShowActionInterface
{
    /**
     * FormationShowActionInterface constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     */
    public function __construct(FormationRepositoryInterface $formationRepo);

    /**
     * @param Request $request
     * @param FormationShowResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, FormationShowResponderInterface $responder): Response;
}
