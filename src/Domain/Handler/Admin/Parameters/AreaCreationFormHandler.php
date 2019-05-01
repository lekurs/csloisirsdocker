<?php


namespace App\Domain\Handler\Admin\Parameters;


use App\Domain\Factory\Interfaces\AreaFactoryInterface;
use App\Domain\Handler\Interfaces\AreaCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\AreaRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AreaCreationFormHandler implements AreaCreationFormHandlerInterface
{
    /**
     * @var AreaFactoryInterface
     */
    private $areaFactory;

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
     * AreaCreationFormHandler constructor.
     *
     * @param AreaFactoryInterface $areaFactory
     * @param AreaRepositoryInterface $areaRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        AreaFactoryInterface $areaFactory,
        AreaRepositoryInterface $areaRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->areaFactory = $areaFactory;
        $this->areaRepo = $areaRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @inheritDoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $area = $this->areaFactory->create(
                $form->getData()->name,
                $form->getData()->address,
                $form->getData()->zip,
                $form->getData()->city
            );

            $this->areaRepo->save($area);

            $this->session->getFlashBag()->add('success', 'Lieu de formation ajouté');

            return true;
        }

        return false;
    }
}
