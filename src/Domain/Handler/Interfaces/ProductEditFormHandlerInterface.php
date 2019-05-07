<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Models\Product;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface ProductEditFormHandlerInterface
{
    public function __construct(
        ProductRepositoryInterface $productRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @param Product $product
     * @return bool
     */
    public function handle(FormInterface $form, Product $product): bool;
}
