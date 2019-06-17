<?php


namespace App\UI\Action\Admin\Products;


use App\Domain\Repository\Interfaces\ImageRepositoryInterface;
use App\UI\Action\Interfaces\ImageEditMainActionInterface;
use App\UI\Responder\Interfaces\ImageEditMainResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ImageEditMainAction
 * @Route(name="imageEdit", path="admin/image/edit/{id}")
 * @Security("has_role('ROLE_ADMIN')")
 */
final class ImageEditMainAction implements ImageEditMainActionInterface
{
    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * ImageEditMainAction constructor.
     *
     * @param ImageRepositoryInterface $imageRepo
     * @param SessionInterface $session
     */
    public function __construct(ImageRepositoryInterface $imageRepo, SessionInterface $session)
    {
        $this->imageRepo = $imageRepo;
        $this->session = $session;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, ImageEditMainResponderInterface $responder): JsonResponse
    {
        $image = $this->imageRepo->getOneById($request->attributes->get('id'));

        $this->imageRepo->setMainImage($image);

        $this->session->getFlashBag()->add('success', 'Image favorite modifiée');

        return $responder->response();
    }
}
