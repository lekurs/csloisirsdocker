<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\DTO\Admin\Parameters\AreaCreationFormDTO;
use App\Domain\Form\Areas\AreaCreationForm;
use App\Domain\Handler\Interfaces\AreaEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\AreaRepositoryInterface;
use App\UI\Action\Interfaces\AreaEditActionInterface;
use App\UI\Responder\Interfaces\AreaEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AreaEditAction
 * @Route(name="areaEdit", path="admin/area/edit/{id}")
 */
final class AreaEditAction implements AreaEditActionInterface
{
    /**
     * @var AreaRepositoryInterface
     */
    private $areaRepo;

    /**
     * @var AreaEditFormHandlerInterface
     */
    private $areaEditHandler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * AreaEditAction constructor.
     *
     * @param AreaRepositoryInterface $areaRepo
     * @param AreaEditFormHandlerInterface $areaEditHandler
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        AreaRepositoryInterface $areaRepo,
        AreaEditFormHandlerInterface $areaEditHandler,
        FormFactoryInterface $formFactory
    ) {
        $this->areaRepo = $areaRepo;
        $this->areaEditHandler = $areaEditHandler;
        $this->formFactory = $formFactory;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, AreaEditResponderInterface $responder): Response
    {
        $area = $this->areaRepo->getOneById($request->attributes->get('id'));

        $areaEdit = new AreaCreationFormDTO(
            $area->getName(),
            $area->getAddress(),
            $area->getZip(),
            $area->getCity()
        );

        $form = $this->formFactory->create(AreaCreationForm::class, $areaEdit)->handleRequest($request);

        if ($this->areaEditHandler->handle($form, $area)) {

            return $responder->response(true, null, $area);
        }

        return $responder->response(false, $form, $area);
    }
}
