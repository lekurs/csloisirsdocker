<?php


namespace App\Domain\Handler\Admin\Formations;


use App\Domain\Factory\Interfaces\FormationFactoryInterface;
use App\Domain\Handler\Interfaces\FormationCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FormationCreationFormHandler implements FormationCreationFormHandlerInterface
{
    /**
     * @var FormationRepositoryInterface
     */
    private $formationRepo;

    /**
     * @var FormationFactoryInterface
     */
    private $formationFactory;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * FormationCreationFormHandler constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     * @param FormationFactoryInterface $formationFactory
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(
        FormationRepositoryInterface $formationRepo,
        FormationFactoryInterface $formationFactory,
        SessionInterface $session,
        ValidatorInterface $validator,
        SlugHelperInterface $slugHelper
    ) {
        $this->formationRepo = $formationRepo;
        $this->formationFactory = $formationFactory;
        $this->session = $session;
        $this->validator = $validator;
        $this->slugHelper = $slugHelper;
    }

    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $formation = $this->formationFactory->create(
                $form->getData()->startDate,
                $form->getData()->endDate,
                $form->getData()->title,
                $form->getData()->description,
                $form->getData()->area,
                $this->slugHelper->replace($form->getData()->title),
                $form->getData()->price,
                $form->getData()->availableSeats
            );

            $this->formationRepo->save($formation);

            $this->session->getFlashBag()->add('success', 'Stage enregistré');

            return true;
        }

        return false;
    }
}