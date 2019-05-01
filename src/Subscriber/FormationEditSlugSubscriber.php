<?php


namespace App\Subscriber;


use App\Services\Interfaces\SlugHelperInterface;
use App\Subscriber\Interfaces\FormationEditSlugSubscriberInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

final class FormationEditSlugSubscriber implements EventSubscriberInterface, FormationEditSlugSubscriberInterface
{
    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * FormationEditSlugSubscriber constructor.
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(SlugHelperInterface $slugHelper)
    {
        $this->slugHelper = $slugHelper;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
           FormEvents::SUBMIT => 'onSubmit',
        ];
    }

    /**
     * @inheritDoc
     */
    public function onSubmit(FormEvent $event)
    {
        $event->getData()->slug = $this->slugHelper->replace($event->getData()->title);
    }
}
