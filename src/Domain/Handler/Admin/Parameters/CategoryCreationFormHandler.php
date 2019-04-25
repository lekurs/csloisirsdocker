<?php


namespace App\Domain\Handler\Admin\Parameters;


use App\Domain\Factory\Interfaces\CategoryFactoryInterface;
use App\Domain\Handler\Interfaces\CategoryCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CategoryCreationFormHandler implements CategoryCreationFormHandlerInterface
{
    /**
     * @var CategoryFactoryInterface
     */
    private $categoryFactory;

    /**
     * @var CategoryRepositoryInterfaces
     */
    private $categoryRepo;

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
     * CategoryCreationFormHandler constructor.
     *
     * @param CategoryFactoryInterface $categoryFactory
     * @param CategoryRepositoryInterfaces $categoryRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(
        CategoryFactoryInterface $categoryFactory,
        CategoryRepositoryInterfaces $categoryRepo,
        SessionInterface $session,
        ValidatorInterface $validator,
        SlugHelperInterface $slugHelper
    ) {
        $this->categoryFactory = $categoryFactory;
        $this->categoryRepo = $categoryRepo;
        $this->session = $session;
        $this->validator = $validator;
        $this->slugHelper = $slugHelper;
    }

    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $category = $this->categoryFactory->create(
                $form->getData()->title,
                $this->slugHelper->replace($form->getData()->title)
            );

//            $this->validator->validate([], ['category_validation']);

            $this->categoryRepo->save($category);

            $this->session->getFlashBag()->add('success', 'Votre catégorie à bien été ajoutée');

            return true;
        }

        return false;
    }
}