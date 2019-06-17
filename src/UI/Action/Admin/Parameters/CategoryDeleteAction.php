<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\UI\Action\Interfaces\CategoryDeleteActionInterface;
use App\UI\Responder\Interfaces\CategoryDeleteResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryDeleteAction
 * @Route(name="categoryDelete", path="admin/category/delete/{id}")
 * @Security("has_role('ROLE_ADMIN')")
 */
final class CategoryDeleteAction implements CategoryDeleteActionInterface
{
    /**
     * @var CategoryRepositoryInterfaces
     */
    private $categoryRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * CategoryDeleteAction constructor.
     *
     * @param CategoryRepositoryInterfaces $categoryRepo
     * @param SessionInterface $session
     */
    public function __construct(
        CategoryRepositoryInterfaces $categoryRepo,
        SessionInterface $session
    ) {
        $this->categoryRepo = $categoryRepo;
        $this->session = $session;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, CategoryDeleteResponderInterface $responder): JsonResponse
    {
        if ($request->isXmlHttpRequest()) {
            $category = $this->categoryRepo->getOne($request->attributes->get('id'));

            $this->categoryRepo->delete($category);

            $this->session->getFlashBag()->add('success', 'Catégorie supprimée');

            return $responder->response();
        }
    }
}
