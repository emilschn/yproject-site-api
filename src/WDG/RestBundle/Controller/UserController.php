<?php

namespace WDG\RestBundle\Controller;

use WDG\RestBundle\Form\BoppUserType;
use WDG\RestBundle\Entity\BoppUser;

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

class UserController extends FOSRestController
{
    /**
     * List all users.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     * 	   404 = "Returned when there is no user"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request               $request      the request object
     *
     * @return array
     */
    public function getUsersAction(Request $request)
    {
        // Select all users
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('WDGRestBundle:BoppUser')->findAll();

        // No user
        if(!$users){
          throw $this->createNotFoundException("No user");
        }

        //Display user
        $view = $this->view($users, 200);
        return $this->handleView($view);
    }

    /**
     * Get a single user.
     *
     * @ApiDoc(
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the user is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the user id
     *
     * @return array
     *
     * @throws NotFoundHttpException when user not exist
     */
    public function getUserAction(Request $request, $id)
    {
        
        $user = $this->getDoctrine()->getRepository('WDGRestBundle:BoppUser')->find($id);
        if(!is_object($user)){
            throw $this->createNotFoundException("User does not exist.");
        }

        $view = $this->view($user, 200);
        return $this->handleView($view);

        return $view;
    }

    /**
     * Presents the form to use to create a new user.
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
    public function newUserAction()
    {
        return $this->createForm(new BoppUserType());
    }

    /**
     * Creates a new user from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppUserType",
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
    public function postUsersAction(Request $request)
    {
        $user = new BoppUser();
        $form = $this->createForm(new BoppUserType(), $user);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $user->getId();
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Presents the form to use to update an existing user.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     200 = "Returned when successful",
     *     404 = "Returned when the user is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the user id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when user not exist
     */
    public function editUsersAction(Request $request, $id)
    {
        $user = $this->getDoctrine()->getRepository('WDGRestBundle:BoppUser')->find($id);
        if(!is_object($user)){
            throw $this->createNotFoundException("User does not exist.");
        }

        $form = $this->createForm(new BoppUserType(), $user);

        return $form;
    }

    /**
     * Update existing user from the submitted data or create a new user at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppUserType",
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
     * @param int     $id      the user id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when user not exist
     */
    public function patchUsersAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('WDGRestBundle:BoppUser')->find($id);
        if (false === $user) {
            $user = new BoppUser();
            $user->id = $id;
            $statusCode = Codes::HTTP_CREATED;
        } else {
            $statusCode = Codes::HTTP_NO_CONTENT;
        }

        $form = $this->createForm(new BoppUserType(), $user);
        $form->submit($request, false);
       
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return  "{'message':'User modified','status':'".$statusCode."','method':'".$_SERVER['REQUEST_METHOD']."'}";
        }
        return array(
            'form' => $form,
        );
    }

    /**
     * Removes a user.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     204="Returned when successful",
     *     404="Returned when the user is not found"
     *   }
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the user id
     *
     * @return RouteRedirectView
     */
    public function deleteUsersAction(Request $request, $id)
    {
		$user = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgUsers')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
    }

}
