<?php


namespace App\UI\Action\Pub;


use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\Domain\Repository\Interfaces\PriceRepositoryInterface;
use App\UI\Action\Interfaces\PricePubShowActionInterface;
use App\UI\Responder\Interfaces\PricePubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PricePubShowAction
 * @Route(name="showPricesAndFormations", path="/prix-formations")
 */
class PricePubShowAction implements PricePubShowActionInterface
{
    private $priceRepo;

    /**
     * PricePubShowAction constructor.
     *
     * @param PriceRepositoryInterface $priceRepo
     */
    public function __construct(PriceRepositoryInterface $priceRepo)
    {
        $this->priceRepo = $priceRepo;
    }

    public function __invoke(Request $request, PricePubShowResponderInterface $responder): Response
    {
        $prices = $this->priceRepo->getAll();

        return $responder->response($prices);
    }
}