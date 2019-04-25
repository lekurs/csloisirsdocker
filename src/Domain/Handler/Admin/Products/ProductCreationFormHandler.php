<?php


namespace App\Domain\Handler\Admin\Products;


use App\Domain\Factory\Interfaces\ProductFactoryInterface;
use App\Domain\Handler\Interfaces\ProductCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ProductCreationFormHandler implements ProductCreationFormHandlerInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * @var ProductFactoryInterface
     */
    private $productFactory;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * ProductCreationFormHandler constructor.
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
    ) {
        $this->productRepo = $productRepo;
        $this->productFactory = $productFactory;
        $this->session = $session;
        $this->validator = $validator;
        $this->slugHelper = $slugHelper;
    }

    /**
     * @inheritDoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

//            $imageTab = [];
//            foreach ($form->getData()->images as $image) {
//                $imageTab[] = $image;
//            }
//
//            foreach ($imageTab as $img) {
//                dump($img);
//            }
            dd($form->getData());

            $product = $this->productFactory->create(
                $form->getData()->title,
                $form->getData()->category,
                $this->slugHelper->replace($form->getData()->title)
            );

            $this->productRepo->save($product);

            $this->session->getFlashBag()->add('success', 'Produit ajouté');

            return true;
        }

        return false;
    }
}
