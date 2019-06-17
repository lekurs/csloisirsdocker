<?php


namespace App\UI\Action\Pub;


use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\Services\Interfaces\NavigationHelperInterface;
use App\UI\Action\Interfaces\FormationPubShowActionInterface;
use App\UI\Responder\Interfaces\FormationPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FormationPubShowAction
 * @Route(name="formationsPubShow", path="/stages")
 */
final class FormationPubShowAction implements FormationPubShowActionInterface
{
    private $formationRepo;

    private $navHelper;

    /**
     * FormationPubShowAction constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     * @param $navHelper
     */
    public function __construct(FormationRepositoryInterface $formationRepo, NavigationHelperInterface $navHelper)
    {
        $this->formationRepo = $formationRepo;
        $this->navHelper = $navHelper;
    }

    public function __invoke(Request $request, FormationPubShowResponderInterface $responder): Response
    {
        $formations = $this->formationRepo->getAllInProgress();

        $navigations = $this->navHelper->showNav();

        return $responder->response($formations, $navigations);
    }
}
