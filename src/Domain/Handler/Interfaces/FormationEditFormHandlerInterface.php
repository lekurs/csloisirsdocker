<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Models\Formation;
use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface FormationEditFormHandlerInterface
{
    /**
     * FormationEditFormHandlerInterface constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        FormationRepositoryInterface $formationRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @param Formation $formation
     * @return bool
     */
    public function handle(FormInterface $form, Formation $formation): bool;
}
