<?php

namespace WDG\CoreBundle\Controller;

use WDG\CoreBundle\Entity\SfWdgRoles;
use WDG\CoreBundle\Form\SfWdgRolesType;

use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\View\View;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class RoleRestController extends FOSRestController
{

    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- SÉLÉCTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//

    /**
     * List all roles.
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
     * @param Request $request the request object
     *
     * @return array
     */
    public function getRolesAction(Request $request)
    {

        // Sélection des utilisateurs
        $em = $this->getDoctrine()->getManager();
        $roles = $em->getRepository('WDGCoreBundle:SfWdgRoles')->findAll();

        // Si il n'y a pas d'utilisateurs, afficher un message d'erreur
        if(!$roles){
          throw $this->createNotFoundException("No role");
        }

        //Sinon afficher les utilisateurs 
        $view = $this->view($roles, 200);
        return $this->handleView($view);

    } // "get_roles"     [GET] /roles

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
    public function getRoleAction($slug, Request $request)
    {
        // Sélection de le rôle
        $role = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgRoles')->findOneBy(array('roleSlug' => $slug ));

        // Si il n'y a pas d'utilisateur, afficher un message d'erreur
        if(!is_object($role)){
          throw $this->createNotFoundException("Role does not exist.");
        }
        //Sinon afficher les utilisateurs 
        $view = $this->view($role, 200);
        return $this->handleView($view);
    } // "get_role"      [GET] /roles/{id}



    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- INSERTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//

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
    public function newRolesAction()
    {
        // Affiche les champs du formulaire
        return $this->createForm(new SfWdgRolesType());
    } // "new_roles"     [GET] /roles/new


    /**
     * Creates a new role from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\CoreBundle\Form\SfWdgRolesType",
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
     * @return array
     */

    public function postRolesAction(Request $request)
    {
        $entity = new SfWdgRoles();
        $form = $this->createForm(new SfWdgRolesType(), $entity);
        $form->bind($request);

        // Si le formulaire est valide, on ajoute le rôle
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return  $entity->getId();
        }
        return array(
            'form' => $form,
        );
    } // "post_roles"    [POST] /roles


    //--------------------------------------------------------------------------------------------//
    //------------------------------------------ ÉDITION -----------------------------------------//
    //--------------------------------------------------------------------------------------------//

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
    public function editRoleAction(Request $request, $id)
    {
        // On affiche les champs du formulaire 
        $role = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgRoles')->findOneBy(array('roleSlug' => $slug));
        return $form = $this->createForm(new SfWdgRolesType(), $role);
    } // "edit_role"     [GET] /roles/{id}/edit


    /**
     * Update existing role from the submitted data or create a new role at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\CoreBundle\Form\RoleType",
     *   statusCodes = {
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *   template="CoreDemoBundle:Role:editRole.html.twig",
     *   templateVar="form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the role id
     *
     * @return FormTypeInterface|RouteRedirectView
     *
     * @throws NotFoundHttpException when role not exist
     */
    public function putRolesAction(Request $request, $slug)
    {

        //On sélectionne le rôle
        $em = $this->getDoctrine()->getManager();
        $role = $em->getRepository('WDGCoreBundle:SfWdgRoles')->findOneBy(array('roleSlug' => $slug));
        //On l'associe au formulaire
        $form = $this->createForm(new SfWdgRolesType(), $role);
        $form->bind($request);

        // Si le formulaire est valide, on modifie le rôle
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush();
            return  '{"message":"Role modified"}';
        }

        return array(
            'form' => $form,
        );
    }


    //--------------------------------------------------------------------------------------------//
    //---------------------------------------- SUPPRESSION ---------------------------------------//
    //--------------------------------------------------------------------------------------------//

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
     *
     * @throws NotFoundHttpException when role not exist
     */
    public function deleteRolesAction(Request $request, $slug)
    {
        $role = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgRoles')->findOneBy(array('roleSlug' => $slug));
        $em = $this->getDoctrine()->getManager();
        if(!is_object($role)){
          throw $this->createNotFoundException("Role does not exist.");
        }
        //On supprime le rôle
        $em->remove($role);
        $em->flush();

        return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
    } // "delete_role" [DELETE] /roles/{id}


    //--------------------------------------------------------------------------------------------//
    //-------------------------------------- AUTRES FONCTIONS ------------------------------------//
    //--------------------------------------------------------------------------------------------//


    public function redirectAction($entity, $code)
    {
        $view = $this->redirectView($this->generateUrl('api_role_get_role', array('id' => $entity->getId())), $code);
        return $this->handleView($view);
    }

    // Afficher les données 
    public function viewAction($data)
    {
        $view = $this->view($data, 200);
        return $this->handleView($view);
    }
}

?>