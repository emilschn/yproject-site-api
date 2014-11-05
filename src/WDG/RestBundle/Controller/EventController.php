<?php

namespace WDG\RestBundle\Controller;

use WDG\RestBundle\Form\BoppEventType;
use WDG\RestBundle\Entity\BoppEvent;

use FOS\RestBundle\Util\Codes;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\RouteRedirectView;

use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends FOSRestController
{
    /**
     * List all events.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     * 	   404 = "Returned when there is no event"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request               $request      the request object
     *
     * @return array
     */
    public function getEventsAction(Request $request)
    {
        // Select all events
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('WDGRestBundle:BoppEvent')->findAll();

        // No event
        if(!$events){
          throw $this->createNotFoundException("No event");
        }

        //Display event
        $view = $this->view($events, 200);
        return $this->handleView($view);
    }

    /**
     * Get a single event.
     *
     * @ApiDoc(
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the event is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the event id
     *
     * @return array
     *
     * @throws NotFoundHttpException when event not exist
     */
    public function getEventAction(Request $request, $id)
    {
        
        $event = $this->getDoctrine()->getRepository('WDGRestBundle:BoppEvent')->find($id);
        if(!is_object($event)){
            throw $this->createNotFoundException("Event does not exist.");
        }

        $view = $this->view($event, 200);
        return $this->handleView($view);

        return $view;
    }

    /**
     * Presents the form to use to create a new event.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @return FormTypeInterface
     */
    public function newEventAction()
    {
        return $this->createForm(new BoppEventType());
    }

    /**
     * Creates a new event from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppEventType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *   statusCode = Codes::HTTP_BAD_REQUEST
     * )
     *
     * @param Request $request the request object
     *
     * @return FormTypeInterface|RouteRedirectView
     */
    public function postEventsAction(Request $request)
    {
        $event = new BoppEvent();
        $form = $this->createForm(new BoppEventType(), $event);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            return  $entity->getId();
        }

        return array(
            'form' => $form
        );
    }

    /**
     * Presents the form to use to update an existing event.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     200 = "Returned when successful",
     *     404 = "Returned when the event is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the event id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when event not exist
     */
    public function editEventsAction(Request $request, $id)
    {
        $event = $this->getDoctrine()->getRepository('WDGRestBundle:BoppEvent')->find($id);
        if(!is_object($event)){
            throw $this->createNotFoundException("Event does not exist.");
        }

        $form = $this->createForm(new BoppEventType(), $event);

        return $form;
    }

    /**
     * Update existing event from the submitted data or create a new event at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppEventType",
     *   statusCodes = {
     *     201 = "Returned when a new resource is created",
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *   templateVar="form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the event id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when event not exist
     */
    public function patchEventsAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('WDGRestBundle:BoppEvent')->find($id);
        if (false === $event) {
            $event = new BoppEvent();
            $event->id = $id;
            $statusCode = Codes::HTTP_CREATED;
        } else {
            $statusCode = Codes::HTTP_NO_CONTENT;
        }

        $form = $this->createForm(new BoppEventType(), $event);
        $form->submit($request, false);
       
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return  "{'message':'Event modified','status':'".$statusCode."'}";
        }
        return array(
            'form' => $form,
        );
    }

    /**
     * Removes a event.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     204="Returned when successful",
     *     404="Returned when the event is not found"
     *   }
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the event id
     *
     * @return RouteRedirectView
     */
    public function deleteEventsAction(Request $request, $id)
    {
		$event = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgEvents')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();

        return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
    }

}
