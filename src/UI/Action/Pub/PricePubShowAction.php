<?php


namespace App\UI\Action\Pub;


use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\Domain\Repository\Interfaces\PriceRepositoryInterface;
use App\Services\Interfaces\NavigationHelperInterface;
use App\UI\Action\Interfaces\PricePubShowActionInterface;
use App\UI\Responder\Interfaces\PricePubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PricePubShowAction
 * @Route(name="showPricesAndFormations", path="/prix-formations")
 */
final class PricePubShowAction implements PricePubShowActionInterface
{
    private $priceRepo;

    private $navHelper;

    /**
     * PricePubShowAction constructor.
     *
     * @param PriceRepositoryInterface $priceRepo
     * @param $navHelper
     */
    public function __construct(PriceRepositoryInterface $priceRepo, NavigationHelperInterface $navHelper)
    {
        $this->priceRepo = $priceRepo;
        $this->navHelper = $navHelper;
    }

    public function __invoke(Request $request, PricePubShowResponderInterface $responder): Response
    {
        $prices = $this->priceRepo->getAll();

        $navigations = $this->navHelper->showNav();

        return $responder->response($prices, $navigations);
    }
}
