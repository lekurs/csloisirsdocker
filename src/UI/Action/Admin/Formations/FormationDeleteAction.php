<?php


namespace App\UI\Action\Admin\Formations;


use App\Domain\Handler\Interfaces\FormationDeleteActionInterface;
use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\UI\Responder\Interfaces\FormationDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FormationDeleteAction
 * @Route(name="formationDelete", path="admin/formation/delete/{id}")
 */
final class FormationDeleteAction implements FormationDeleteActionInterface
{
    /**
     * @var FormationRepositoryInterface
     */
    private $formationRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * FormationDeleteAction constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     * @param SessionInterface $session
     */
    public function __construct(
        FormationRepositoryInterface $formationRepo,
        SessionInterface $session
    ) {
        $this->formationRepo = $formationRepo;
        $this->session = $session;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, FormationDeleteResponderInterface $responder): JsonResponse
    {
        if ($request->isXmlHttpRequest()) {
            $formation = $this->formationRepo->getOneById($request->attributes->get('id'));

            $this->formationRepo->delete($formation);

            $this->session->getFlashBag()->add('success', 'Stage supprimé');

            return $responder->response();
        }
    }
}
