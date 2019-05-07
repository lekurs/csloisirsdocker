<?php


namespace App\UI\Action\Admin\Products;


use App\Domain\DTO\Admin\Products\ProductEditFormDTO;
use App\Domain\Form\Products\ProductEditForm;
use App\Domain\Handler\Interfaces\ProductEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Action\Interfaces\ProductEditActionInterface;
use App\UI\Responder\Interfaces\ProductEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductEditAction
 * @Route(name="productEdit", path="admin/product/edit/{slug}")
 */
final class ProductEditAction implements ProductEditActionInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var ProductEditFormHandlerInterface
     */
    private $productEditFormHandler;

    /**
     * ProductEditAction constructor.
     *
     * @param ProductRepositoryInterface $productRepo
     * @param FormFactoryInterface $formFactory
     * @param ProductEditFormHandlerInterface $productEditFormHandler
     */
    public function __construct(
        ProductRepositoryInterface $productRepo,
        FormFactoryInterface $formFactory,
        ProductEditFormHandlerInterface $productEditFormHandler
    ) {
        $this->productRepo = $productRepo;
        $this->formFactory = $formFactory;
        $this->productEditFormHandler = $productEditFormHandler;
    }

    public function __invoke(Request $request, ProductEditResponderInterface $responder): Response
    {
        $product = $this->productRepo->getOneBySlug($request->attributes->get('slug'));

        $productUpdate = new ProductEditFormDTO(
            $product->getTitle(),
            $product->getCategory(),
            $product->getSlug()
        );

        $form = $this->formFactory->create(ProductEditForm::class, $productUpdate)->handleRequest($request);

        if ($this->productEditFormHandler->handle($form, $product)) {

            return $responder->response(true, null, $product);
        }

        return $responder->response(false, $form, $product);
    }
}