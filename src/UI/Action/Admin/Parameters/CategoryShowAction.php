<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\UI\Action\Interfaces\CategoryShowActionInterface;
use App\UI\Responder\Interfaces\CategoryShowResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CategoryShowAction
 * @Route(name="categoryShow", path="admin/category/show")
 */
final class CategoryShowAction implements CategoryShowActionInterface
{
    /**
     * @var CategoryRepositoryInterfaces
     */
    private $categoryRepo;

    /**
     * CategoryShowAction constructor.
     * @param CategoryRepositoryInterfaces $categoryRepo
     */
    public function __construct(CategoryRepositoryInterfaces $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(CategoryShowResponderInterface $responder): Response
    {
        $categories = $this->categoryRepo->getAll();

        return $responder->response($categories);
    }
}
