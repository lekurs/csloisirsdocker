<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Form\Areas\AreaCreationForm;
use App\Domain\Handler\Interfaces\AreaCreationFormHandlerInterface;
use App\UI\Action\Interfaces\AreaCreationActionInterface;
use App\UI\Responder\Interfaces\AreaCreationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AreaCreationAction
 * @Route(name="areaCreation", path="admin/area/add")
 * @IsGranted("ROLE_ADMIN")
 */
final class AreaCreationAction implements AreaCreationActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var AreaCreationFormHandlerInterface
     */
    private $areaCreationFormHandler;

    /**
     * AreaCreationAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param AreaCreationFormHandlerInterface $areaCreationFormHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        AreaCreationFormHandlerInterface $areaCreationFormHandler
    ) {
        $this->formFactory = $formFactory;
        $this->areaCreationFormHandler = $areaCreationFormHandler;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, AreaCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(AreaCreationForm::class)->handleRequest($request);

        if ($this->areaCreationFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
