<?php

namespace App\EventSubscriber;

use App\Entity\FilledField;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class DynamicFormSubscriber implements EventSubscriberInterface
{
    public function onPreSetData(FormEvent $event)
    {
        /** @var FilledField $filledField */
        $filledField = $event->getData();
        $event->getForm()
                    ->add('content', $filledField->getField()->getWidgetForm()->getType(), [
                        'label' => $filledField->getField()->getLabel()
                    ])
        ;
    }

    public static function getSubscribedEvents()
    {
        return [
            FormEvents::POST_SET_DATA => 'onPreSetData',
        ];
    }
}
