<?php


namespace App\UI\Action\Pub;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\Services\Interfaces\NavigationHelperInterface;
use App\UI\Action\Interfaces\CategoryPubShowActionInterface;
use App\UI\Responder\Interfaces\CategoryPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryPubShowAction
 * @Route(name="showPubCat", path="/cat/{category}")
 */
final class CategoryPubShowAction implements CategoryPubShowActionInterface
{
    /**
     * @var CategoryRepositoryInterfaces
     */
    private $categoryRepo;

    private $navHelper;

    /**
     * CategoryPubShowAction constructor.
     *
     * @param CategoryRepositoryInterfaces $categoryRepo
     * @param $navHelper
     */
    public function __construct(CategoryRepositoryInterfaces $categoryRepo, NavigationHelperInterface $navHelper)
    {
        $this->categoryRepo = $categoryRepo;
        $this->navHelper = $navHelper;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, CategoryPubShowResponderInterface $responder): Response
    {
        $category = $this->categoryRepo->getOneBySlug($request->attributes->get('category'));

        $navigations = $this->navHelper->showNav();

        return $responder->response($category, $navigations);
    }
}