<?php


namespace App\Domain\Handler\Admin\Products;


use App\Domain\Handler\Interfaces\ProductEditFormHandlerInterface;
use App\Domain\Models\Product;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ProductEditFormHandler implements ProductEditFormHandlerInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * ProductEditFormHandler constructor.
     *
     * @param ProductRepositoryInterface $productRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ProductRepositoryInterface $productRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->productRepo = $productRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form, Product $product): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $product->edit($form->getData());

            $this->productRepo->edit();

            $this->session->getFlashBag()->add('success', 'Produit mis à jour');

            return true;
        }

        return false;
    }
}
