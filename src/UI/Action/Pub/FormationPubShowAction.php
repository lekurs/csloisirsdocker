<?php


namespace App\UI\Action\Pub;


use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\UI\Action\Interfaces\FormationPubShowActionInterface;
use App\UI\Responder\Interfaces\FormationPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FormationPubShowAction
 * @Route(name="formationsPubShow", path="/stages")
 */
class FormationPubShowAction implements FormationPubShowActionInterface
{
    private $formationRepo;

    /**
     * FormationPubShowAction constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     */
    public function __construct(FormationRepositoryInterface $formationRepo)
    {
        $this->formationRepo = $formationRepo;
    }

    public function __invoke(Request $request, FormationPubShowResponderInterface $responder): Response
    {
        $formations = $this->formationRepo->getAllInProgress();

        return $responder->response($formations);
    }
}