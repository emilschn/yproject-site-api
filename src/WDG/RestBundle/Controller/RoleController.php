<?php

namespace WDG\RestBundle\Controller;

use WDG\RestBundle\Form\BoppRoleType;
use WDG\RestBundle\Entity\BoppRole;

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

class RoleController extends FOSRestController
{
    /**
     * List all roles.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     * 	   404 = "Returned when there is no role"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request               $request      the request object
     *
     * @return array
     */
    public function getRolesAction(Request $request)
    {
        // Select all roles
        $em = $this->getDoctrine()->getManager();
        $roles = $em->getRepository('WDGRestBundle:BoppRole')->findAll();

        // No role
        if(!$roles){
          throw $this->createNotFoundException("No role");
        }

        //Display role
        $view = $this->view($roles, 200);
        return $this->handleView($view);
    }

    /**
     * Get a single role.
     *
     * @ApiDoc(
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the role is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the role id
     *
     * @return array
     *
     * @throws NotFoundHttpException when role not exist
     */
    public function getRoleAction(Request $request, $id)
    {
        
        $role = $this->getDoctrine()->getRepository('WDGRestBundle:BoppRole')->find($id);
        if(!is_object($role)){
            throw $this->createNotFoundException("Role does not exist.");
        }

        $view = $this->view($role, 200);
        return $this->handleView($view);

        return $view;
    }

    /**
     * Presents the form to use to create a new role.
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
    public function newRoleAction()
    {
        return $this->createForm(new BoppRoleType());
    }

    /**
     * Creates a new role from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppRoleType",
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
    public function postRolesAction(Request $request)
    {
        $role = new BoppRole();
        $form = $this->createForm(new BoppRoleType(), $role);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush();
            return  $entity->getId();
        }

        return array(
            'form' => $form
        );
    }

    /**
     * Presents the form to use to update an existing role.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     200 = "Returned when successful",
     *     404 = "Returned when the role is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the role id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when role not exist
     */
    public function editRolesAction(Request $request, $id)
    {
        $role = $this->getDoctrine()->getRepository('WDGRestBundle:BoppRole')->find($id);
        if(!is_object($role)){
            throw $this->createNotFoundException("Role does not exist.");
        }

        $form = $this->createForm(new BoppRoleType(), $role);

        return $form;
    }

    /**
     * Update existing role from the submitted data or create a new role at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppRoleType",
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
     * @param int     $id      the role id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when role not exist
     */
    public function patchRolesAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
        $role = $em->getRepository('WDGRestBundle:BoppRole')->find($id);
        if (false === $role) {
            $role = new BoppRole();
            $role->id = $id;
            $statusCode = Codes::HTTP_CREATED;
        } else {
            $statusCode = Codes::HTTP_NO_CONTENT;
        }

        $form = $this->createForm(new BoppRoleType(), $role);
        $form->submit($request, false);
       
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return  "{'message':'Role modified','status':'".$statusCode."'}";
        }
        return array(
            'form' => $form,
        );
    }

    /**
     * Removes a role.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     204="Returned when successful",
     *     404="Returned when the role is not found"
     *   }
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the role id
     *
     * @return RouteRedirectView
     */
    public function deleteRolesAction(Request $request, $id)
    {
		$role = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgRoles')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($role);
        $em->flush();

        return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
    }

}
