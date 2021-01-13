<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\UI\Action\Interfaces\FormationShowActionInterface;
use App\UI\Responder\Interfaces\FormationShowResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FormationShowAction
 * @Route(name="formationShow", path="admin/formation/show")
 * @IsGranted("ROLE_ADMIN")
 */
final class FormationShowAction implements FormationShowActionInterface
{
    /**
     * @var FormationRepositoryInterface
     */
    private $formationRepo;

    /**
     * FormationShowAction constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     */
    public function __construct(FormationRepositoryInterface $formationRepo)
    {
        $this->formationRepo = $formationRepo;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, FormationShowResponderInterface $responder): Response
    {
        $formations = $this->formationRepo->getAll();

        return $responder->response($formations);
    }
}
