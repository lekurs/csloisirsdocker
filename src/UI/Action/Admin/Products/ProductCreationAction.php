<?php


namespace App\UI\Action\Admin\Products;


use App\Domain\Form\Products\ProductCreationForm;
use App\Domain\Handler\Interfaces\ProductCreationFormHandlerInterface;
use App\UI\Action\Interfaces\ProductCreationActionInterface;
use App\UI\Responder\Interfaces\ProductCreationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductCreationAction
 * @Route(name="productCreation", path="admin/product/add")
 * @Security("has_role('ROLE_ADMIN')")
 */
final class ProductCreationAction implements ProductCreationActionInterface
{
    /**
     * @var ProductCreationFormHandlerInterface
     */
    private $productCreationFormHandler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * ProductCreationAction constructor.
     *
     * @param ProductCreationFormHandlerInterface $productCreationFormHandler
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        ProductCreationFormHandlerInterface $productCreationFormHandler,
        FormFactoryInterface $formFactory
    ) {
        $this->productCreationFormHandler = $productCreationFormHandler;
        $this->formFactory = $formFactory;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, ProductCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(ProductCreationForm::class)->handleRequest($request);

        if ($this->productCreationFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
