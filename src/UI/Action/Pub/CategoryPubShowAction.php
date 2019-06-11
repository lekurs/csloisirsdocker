<?php


namespace App\UI\Action\Pub;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\UI\Action\Interfaces\CategoryPubShowActionInterface;
use App\UI\Responder\Interfaces\CategoryPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryPubShowAction
 * @Route(name="showPubCat", path="/{category}")
 */
final class CategoryPubShowAction implements CategoryPubShowActionInterface
{
    /**
     * @var CategoryRepositoryInterfaces
     */
    private $categoryRepo;

    /**
     * CategoryPubShowAction constructor.
     *
     * @param CategoryRepositoryInterfaces $categoryRepo
     */
    public function __construct(CategoryRepositoryInterfaces $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, CategoryPubShowResponderInterface $responder): Response
    {
        $category = $this->categoryRepo->getOneBySlug($request->attributes->get('category'));

        return $responder->response($category);
    }
}