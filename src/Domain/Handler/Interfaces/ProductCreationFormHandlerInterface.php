<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\ImageFactoryInterface;
use App\Domain\Factory\Interfaces\ProductFactoryInterface;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use App\Services\Interfaces\UploadedFileHelperInterface;
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
     * @param ImageFactoryInterface $imageFactory
     * @param SessionInterface $session
     * @param UploadedFileHelperInterface $uploadedFileHelper
     * @param ValidatorInterface $validator
     * @param SlugHelperInterface $slugHelper
     * @param string $dirImagesPath
     */
    public function __construct(
        ProductRepositoryInterface $productRepo,
        ProductFactoryInterface $productFactory,
        ImageFactoryInterface $imageFactory,
        SessionInterface $session,
        UploadedFileHelperInterface $uploadedFileHelper,
        ValidatorInterface $validator,
        SlugHelperInterface $slugHelper,
        string $dirImagesPath
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
