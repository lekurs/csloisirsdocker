<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\UI\Action\Interfaces\CategoryShowActionInterface;
use App\UI\Responder\Interfaces\CategoryShowResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryPubShowAction
 * @Route(name="categoryShow", path="admin/category/show")
 * @IsGranted("ROLE_ADMIN")
 */
final class CategoryShowAction implements CategoryShowActionInterface
{
    /**
     * @var CategoryRepositoryInterfaces
     */
    private $categoryRepo;

    /**
     * CategoryPubShowAction constructor.
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
