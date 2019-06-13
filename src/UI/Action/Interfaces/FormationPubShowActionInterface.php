<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\UI\Responder\Interfaces\FormationPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface FormationPubShowActionInterface
{
    /**
     * FormationPubShowActionInterface constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     */
    public function __construct(FormationRepositoryInterface $formationRepo);

    /**
     * @param Request $request
     * @param FormationPubShowResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, FormationPubShowResponderInterface $responder): Response;
}
