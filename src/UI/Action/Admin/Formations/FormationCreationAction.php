<?php


namespace App\UI\Action\Admin\Formations;


use App\Domain\Form\Formations\FormationCreationForm;
use App\Domain\Handler\Interfaces\FormationCreationFormHandlerInterface;
use App\UI\Action\Interfaces\FormationCreationActionInterface;
use App\UI\Responder\Interfaces\FormationCreationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FormationCreationAction
 * @Route(name="formationCreation", path="admin/formation/add")
 * @IsGranted('ROLE_ADMIN')
 */
final class FormationCreationAction implements FormationCreationActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var FormationCreationFormHandlerInterface
     */
    private $formationCreationFormHandler;

    /**
     * FormationCreationAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param FormationCreationFormHandlerInterface $formationCreationFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, FormationCreationFormHandlerInterface $formationCreationFormHandler)
    {
        $this->formFactory = $formFactory;
        $this->formationCreationFormHandler = $formationCreationFormHandler;
    }

    public function __invoke(Request $request, FormationCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(FormationCreationForm::class)->handleRequest($request);

        if ($this->formationCreationFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
