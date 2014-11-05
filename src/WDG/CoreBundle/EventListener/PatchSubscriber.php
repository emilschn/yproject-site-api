<?php
namespace WDG\CoreBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

/**
 * Changes Form->bind() behavior so that it treats not set values as if they
 * were sent unchanged.
 *
 * Use when you don't want fields to be set to NULL when they are not displayed
 * on the page (or to implement PUT/PATCH requests).
 */
class PatchSubscriber implements EventSubscriberInterface
{
    public function onPreBind(FormEvent $event)
    {
        $form = $event->getForm();
        $clientData = $event->getData();
        $clientData = array_replace($this->unbind($form), $clientData ?: array());
        $event->setData($clientData);
    }

    /**
     * Returns the form's data like $form->bind() expects it
     */
    protected function unbind($form)
    {
        if (count($form) > 0) {
           
            $ary = array();
            foreach ($form->all() as $name => $child) {
                $ary[$name] = $this->unbind($child);
            }
            return $ary;
        } else {
            return $form->getViewData();
        }
    }

    static public function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_BIND => 'onPreBind',
        );
    }
}

