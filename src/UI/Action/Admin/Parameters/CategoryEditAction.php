<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\Services\Interfaces\SlugHelperInterface;
use App\UI\Action\Interfaces\CategoryEditActionInterface;
use App\UI\Responder\Interfaces\CategoryEditResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryEditAction
 * @Route(name="categoryEdit", path="admin/category/edit/{id}")
 * @IsGranted("ROLE_ADMIN")
 */
final class CategoryEditAction implements CategoryEditActionInterface
{
    /**
     * @var CategoryRepositoryInterfaces
     */
    private $categoryRepo;

    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * CategoryEditAction constructor.
     * @param CategoryRepositoryInterfaces $categoryRepo
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(CategoryRepositoryInterfaces $categoryRepo, SlugHelperInterface $slugHelper)
    {
        $this->categoryRepo = $categoryRepo;
        $this->slugHelper = $slugHelper;
    }


    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, CategoryEditResponderInterface $responder): JsonResponse
    {
        if ($request->isXmlHttpRequest()) {
            $category = $this->categoryRepo->getOne($request->attributes->get('id'));

            $slug = $this->slugHelper->replace($request->request->get('title'));

            $category->manageCategory($request->request->get('title'), $slug);

            $this->categoryRepo->edit();

            return new JsonResponse(['success'], 200);
        }
    }
}
