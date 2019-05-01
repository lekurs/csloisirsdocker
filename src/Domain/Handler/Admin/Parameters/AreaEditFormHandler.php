<?php


namespace App\Domain\Handler\Admin\Parameters;


use App\Domain\Handler\Interfaces\AreaEditFormHandlerInterface;
use App\Domain\Models\Area;
use App\Domain\Repository\Interfaces\AreaRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AreaEditFormHandler implements AreaEditFormHandlerInterface
{
    /**
     * @var AreaRepositoryInterface
     */
    private $areaRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * AreaEditFormHandler constructor.
     *
     * @param AreaRepositoryInterface $areaRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        AreaRepositoryInterface $areaRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->areaRepo = $areaRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form, Area $area): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $area->edit($form->getData());

            $this->areaRepo->edit();

            $this->session->getFlashBag()->add('success', 'Lieu de stage mis à jour');

            return true;
        }

        return false;
    }
}