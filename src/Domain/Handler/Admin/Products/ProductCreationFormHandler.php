<?php


namespace App\Domain\Handler\Admin\Products;


use App\Domain\Factory\Interfaces\ImageFactoryInterface;
use App\Domain\Factory\Interfaces\ProductFactoryInterface;
use App\Domain\Handler\Interfaces\ProductCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use App\Services\Interfaces\UploadedFileHelperInterface;
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
     * @var ImageFactoryInterface
     */
    private $imageFactory;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var UploadedFileHelperInterface
     */
    private $uploadedFileHelper;

    /**
     * @var string
     */
    private $dirImagesPath;

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
    ) {
        $this->productRepo = $productRepo;
        $this->productFactory = $productFactory;
        $this->imageFactory = $imageFactory;
        $this->session = $session;
        $this->uploadedFileHelper = $uploadedFileHelper;
        $this->validator = $validator;
        $this->slugHelper = $slugHelper;
        $this->dirImagesPath = $dirImagesPath;
    }

    /**
     * @inheritDoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $imgTab = [];

            if (count($form->getData()->images) > 0) {
                foreach ($form->getData()->images as $imgUploadedDTO) {
                    foreach($imgUploadedDTO as $img) {
                        $imgTab[] = $this->imageFactory->create($this->dirImagesPath . $img->getClientOriginalName());
                        $this->uploadedFileHelper->move($img, $form->getData()->title);
                    }
                }
            }

            $product = $this->productFactory->create(
                $form->getData()->title,
                $form->getData()->description,
                $form->getData()->category,
                $imgTab,
                $this->slugHelper->replace($form->getData()->title)
            );

            $this->productRepo->save($product);

            $this->session->getFlashBag()->add('success', 'Produit ajouté');

            return true;
        }

        return false;
    }
}
