<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\ProductFactoryInterface;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface ProductCreationFormHandlerInterface
{
    /**
     * ProductCreationFormHandlerInterface constructor.
     *
     * @param ProductRepositoryInterface $productRepo
     * @param ProductFactoryInterface $productFactory
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(
        ProductRepositoryInterface $productRepo,
        ProductFactoryInterface $productFactory,
        SessionInterface $session,
        ValidatorInterface $validator,
        SlugHelperInterface $slugHelper
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
