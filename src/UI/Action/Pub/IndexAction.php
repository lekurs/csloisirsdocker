<?php


namespace App\UI\Action\Pub;

use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
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
     * @var CategoryRepositoryInterfaces
     */
    private $categoryRepo;

    /**
     * IndexAction constructor.
     *
     * @inheritDoc
     */
    public function __construct(
        FormationRepositoryInterface $formationRepo,
        CategoryRepositoryInterfaces $categoryRepo
    ) {
        $this->formationRepo = $formationRepo;
        $this->categoryRepo = $categoryRepo;
    }


    /**
     * @inheritDoc
     */
    public function __invoke(IndexResponderInterface $responder): Response
    {
        $formations = $this->formationRepo->getAllInProgress();

        $categories = $this->categoryRepo->getAll();

        $tabFormation = [];

        foreach ($formations as $formation) {
            $tabFormation[$formation->getArea()->getName()][] = $formation;
        }

        return $responder->response($tabFormation, $categories);
    }
}