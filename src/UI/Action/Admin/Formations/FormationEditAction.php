<?php


namespace App\UI\Action\Admin\Formations;


use App\Domain\DTO\Admin\Formations\FormationEditFormDTO;
use App\Domain\Form\Formations\FormationEditForm;
use App\Domain\Handler\Interfaces\FormationEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\UI\Action\Interfaces\FormationEditActionInterface;
use App\UI\Responder\Interfaces\FormationEditResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FormationEditAction
 * @Route(name="formationEdit", path="admin/formation/edit/{slug}")
 * @Security("has_role('ROLE_ADMIN')")
 */
final class FormationEditAction implements FormationEditActionInterface
{
    /**
     * @var FormationRepositoryInterface
     */
    private $formationRepo;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var FormationEditFormHandlerInterface
     */
    private $formationEditFormHandler;

    /**
     * FormationEditAction constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     * @param FormFactoryInterface $formFactory
     * @param FormationEditFormHandlerInterface $formationEditFormHandler
     */
    public function __construct(
        FormationRepositoryInterface $formationRepo,
        FormFactoryInterface $formFactory,
        FormationEditFormHandlerInterface $formationEditFormHandler
    ) {
        $this->formationRepo = $formationRepo;
        $this->formFactory = $formFactory;
        $this->formationEditFormHandler = $formationEditFormHandler;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, FormationEditResponderInterface $responder): Response
    {
        $formation = $this->formationRepo->getOneBySlug($request->attributes->get('slug'));

        $formationEdit = new FormationEditFormDTO(
            $formation->getStartDate(),
            $formation->getEndDate(),
            $formation->getTitle(),
            $formation->getDescription(),
            $formation->getArea(),
            $formation->getSlug(),
            $formation->getPrice(),
            $formation->getAvailableSeats()
        );

        $form = $this->formFactory->create(FormationEditForm::class, $formationEdit)->handleRequest($request);

        if ($this->formationEditFormHandler->handle($form, $formation)) {

            return $responder->response(true, null, $formation);
        }

        return $responder->response(false, $form, $formation);
    }
}
