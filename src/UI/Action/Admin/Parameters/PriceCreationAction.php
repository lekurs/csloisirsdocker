<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Form\Prices\PriceCreationForm;
use App\Domain\Handler\Interfaces\PriceCreationHandlerInterface;
use App\UI\Action\Interfaces\PriceCreationActionInterface;
use App\UI\Responder\Interfaces\PriceCreationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PriceCreationAction
 * @Route(name="priceCreation", path="admin/prix/add")
 * @IsGranted("ROLE_ADMIN")
 */
final class PriceCreationAction implements PriceCreationActionInterface
{
    private $formFactory;

    private $priceCreationHandler;

    /**
     * PriceCreationAction constructor.
     *
     * @param $formFactory
     * @param $priceCreationHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        PriceCreationHandlerInterface $priceCreationHandler
    ) {
        $this->formFactory = $formFactory;
        $this->priceCreationHandler = $priceCreationHandler;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, PriceCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(PriceCreationForm::class)->handleRequest($request);

        if ($this->priceCreationHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
