<?php


namespace App\Domain\Handler\Admin\Parameters;


use App\Domain\Factory\ImageFactory;
use App\Domain\Factory\Interfaces\AreaFactoryInterface;
use App\Domain\Factory\Interfaces\ImageFactoryInterface;
use App\Domain\Handler\Interfaces\AreaCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\AreaRepositoryInterface;
use App\Services\Interfaces\UploadedFileHelperInterface;
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
     * @var UploadedFileHelperInterface
     */
    private $fileHelper;

    /**
     * @var ImageFactoryInterface
     */
    private $imageFactory;

    /**
     * @var string
     */
    private $dirImagesPath;

    /**
     * AreaCreationFormHandler constructor.
     *
     * @inheritDoc
     */
    public function __construct(
        AreaFactoryInterface $areaFactory,
        AreaRepositoryInterface $areaRepo,
        SessionInterface $session,
        ValidatorInterface $validator,
        UploadedFileHelperInterface $fileHelper,
        ImageFactoryInterface $imageFactory,
        string $dirImagesPath
    ) {
        $this->areaFactory = $areaFactory;
        $this->areaRepo = $areaRepo;
        $this->session = $session;
        $this->validator = $validator;
        $this->fileHelper = $fileHelper;
        $this->imageFactory = $imageFactory;
        $this->dirImagesPath = $dirImagesPath;
    }

    /**
     * @inheritDoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $file = null;

            if (!empty($form->getData()->image)) {
                $file = $form->getData()->image;
                $this->fileHelper->move($file);
            }

            $area = $this->areaFactory->create(
                $form->getData()->name,
                $form->getData()->address,
                $form->getData()->zip,
                $form->getData()->city,
                $this->dirImagesPath . $file->getClientOriginalName()
            );

            $this->areaRepo->save($area);

            $this->session->getFlashBag()->add('success', 'Lieu de formation ajouté');

            return true;
        }

        return false;
    }
}
