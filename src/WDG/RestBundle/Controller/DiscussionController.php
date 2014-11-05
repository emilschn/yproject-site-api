<?php

namespace WDG\RestBundle\Controller;

use WDG\RestBundle\Form\BoppDiscussionType;
use WDG\RestBundle\Entity\BoppDiscussion;

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

class DiscussionController extends FOSRestController
{
    /**
     * List all discussions.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     * 	   404 = "Returned when there is no discussion"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request               $request      the request object
     *
     * @return array
     */
    public function getDiscussionsAction(Request $request)
    {
        // Select all discussions
        $em = $this->getDoctrine()->getManager();
        $discussions = $em->getRepository('WDGRestBundle:BoppDiscussion')->findAll();

        // No discussion
        if(!$discussions){
          throw $this->createNotFoundException("No discussion");
        }

        //Display discussion
        $view = $this->view($discussions, 200);
        return $this->handleView($view);
    }

    /**
     * Get a single discussion.
     *
     * @ApiDoc(
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the discussion is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the discussion id
     *
     * @return array
     *
     * @throws NotFoundHttpException when discussion not exist
     */
    public function getDiscussionAction(Request $request, $id)
    {
        
        $discussion = $this->getDoctrine()->getRepository('WDGRestBundle:BoppDiscussion')->find($id);
        if(!is_object($discussion)){
            throw $this->createNotFoundException("Discussion does not exist.");
        }

        $view = $this->view($discussion, 200);
        return $this->handleView($view);

        return $view;
    }

    /**
     * Presents the form to use to create a new discussion.
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
    public function newDiscussionAction()
    {
        return $this->createForm(new BoppDiscussionType());
    }

    /**
     * Creates a new discussion from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppDiscussionType",
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
    public function postDiscussionsAction(Request $request)
    {
        $discussion = new BoppDiscussion();
        $form = $this->createForm(new BoppDiscussionType(), $discussion);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($discussion);
            $em->flush();
            return  $entity->getId();
        }

        return array(
            'form' => $form
        );
    }

    /**
     * Presents the form to use to update an existing discussion.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     200 = "Returned when successful",
     *     404 = "Returned when the discussion is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the discussion id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when discussion not exist
     */
    public function editDiscussionsAction(Request $request, $id)
    {
        $discussion = $this->getDoctrine()->getRepository('WDGRestBundle:BoppDiscussion')->find($id);
        if(!is_object($discussion)){
            throw $this->createNotFoundException("Discussion does not exist.");
        }

        $form = $this->createForm(new BoppDiscussionType(), $discussion);

        return $form;
    }

    /**
     * Update existing discussion from the submitted data or create a new discussion at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppDiscussionType",
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
     * @param int     $id      the discussion id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when discussion not exist
     */
    public function patchDiscussionsAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
        $discussion = $em->getRepository('WDGRestBundle:BoppDiscussion')->find($id);
        if (false === $discussion) {
            $discussion = new BoppDiscussion();
            $discussion->id = $id;
            $statusCode = Codes::HTTP_CREATED;
        } else {
            $statusCode = Codes::HTTP_NO_CONTENT;
        }

        $form = $this->createForm(new BoppDiscussionType(), $discussion);
        $form->submit($request, false);
       
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return  "{'message':'Discussion modified','status':'".$statusCode."'}";
        }
        return array(
            'form' => $form,
        );
    }

    /**
     * Removes a discussion.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     204="Returned when successful",
     *     404="Returned when the discussion is not found"
     *   }
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the discussion id
     *
     * @return RouteRedirectView
     */
    public function deleteDiscussionsAction(Request $request, $id)
    {
		$discussion = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgDiscussions')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($discussion);
        $em->flush();

        return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
    }

}
