<?php


namespace App\UI\Action\Pub;

use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\UI\Action\Interfaces\IndexActionInterface;
use App\UI\Responder\Interfaces\IndexResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexAction
 * @Route(name="index", path="/")
 */
final class IndexAction implements IndexActionInterface
{
    /**
     * @var FormationRepositoryInterface
     */
    private $formationRepo;

    /**
     * IndexAction constructor.
     * @param FormationRepositoryInterface $formationRepo
     */
    public function __construct(FormationRepositoryInterface $formationRepo)
    {
        $this->formationRepo = $formationRepo;
    }


    /**
     * @inheritDoc
     */
    public function __invoke(IndexResponderInterface $responder): Response
    {
        $formations = $this->formationRepo->getAllInProgress();

        $tabFormation = [];

        foreach ($formations as $formation) {
            $tabFormation[$formation->getArea()->getName()][] = $formation;
        }

        return $responder->response($tabFormation);
    }
}