<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Repository\Interfaces\AreaRepositoryInterface;
use App\UI\Action\Interfaces\AreaShowActionInterface;
use App\UI\Responder\Interfaces\AreaShowResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AreaShowAction
 * @Route(name="areaShow", path="admin/area/show")
 * @IsGranted("ROLE_ADMIN")
 */
final class AreaShowAction implements AreaShowActionInterface
{
    /**
     * @var AreaRepositoryInterface
     */
    private $areaRepo;

    /**
     * AreaShowAction constructor.
     *
     * @param AreaRepositoryInterface $areaRepo
     */
    public function __construct(AreaRepositoryInterface $areaRepo)
    {
        $this->areaRepo = $areaRepo;
    }

    public function __invoke(Request $request, AreaShowResponderInterface $responder): Response
    {
        $areas = $this->areaRepo->getAll();

        return $responder->response($areas);
    }
}
