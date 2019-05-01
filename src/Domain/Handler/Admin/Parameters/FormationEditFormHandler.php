<?php


namespace App\Domain\Handler\Admin\Parameters;


use App\Domain\Handler\Interfaces\FormationEditFormHandlerInterface;
use App\Domain\Models\Formation;
use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class FormationEditFormHandler implements FormationEditFormHandlerInterface
{
    /**
     * @var FormationRepositoryInterface
     */
    private $formationRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * FormationEditFormHandler constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        FormationRepositoryInterface $formationRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->formationRepo = $formationRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @inheritDoc
     */
    public function handle(FormInterface $form, Formation $formation): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $formation->edit($form->getData());

            $this->formationRepo->edit();

            $this->session->getFlashBag()->add('success', 'Stage mis à jour');

            return true;
        }

        return false;
    }
}
