<?php

namespace WDG\CoreBundle\Controller;

use WDG\CoreBundle\Entity\SfWdgUsers;
use WDG\CoreBundle\Form\SfWdgUsersType;

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


class UserRestController extends FOSRestController
{

    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- SÉLÉCTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//

    /**
     * List all users.
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
    public function getUsersAction(Request $request)
    {

        // Sélection des utilisateurs
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('WDGCoreBundle:SfWdgUsers')->findAll();

        // Si il n'y a pas d'utilisateurs, afficher un message d'erreur
        if(!$users){
          throw $this->createNotFoundException("No user");
        }

        //Sinon afficher les utilisateurs 
        $view = $this->view($users, 200);
        return $this->handleView($view);

    } // "get_users"     [GET] /users

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
    public function getUserAction($id, Request $request)
    {
        // Sélection de l'utilisateur
        $user = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgUsers')->find($id);

        // Si il n'y a pas d'utilisateur, afficher un message d'erreur
        if(!is_object($user)){
          throw $this->createNotFoundException("User does not exist.");
        }
        //Sinon afficher les utilisateurs 
        $view = $this->view($user, 200);
        return $this->handleView($view);
    } // "get_user"      [GET] /users/{id}



    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- INSERTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//

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
    public function newUsersAction()
    {
        // Affiche les champs du formulaire
        return $this->createForm(new SfWdgUsersType());
    } // "new_users"     [GET] /users/new


    /**
     * Creates a new user from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\CoreBundle\Form\SfWdgUsersType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *
     * )
     *
     * @param Request $request the request object
     *
     * @return array
     */

    public function postUsersAction(Request $request)
    {
        $entity = new SfWdgUsers();
        $form = $this->createForm(new SfWdgUsersType(), $entity);
        $form->bind($request);

        // Si le formulaire est valide, on ajoute l'utilisateur
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return  $entity->getId();
        }
        return array(
            'form' => $form,
        );
    } // "post_users"    [POST] /users


    //--------------------------------------------------------------------------------------------//
    //------------------------------------------ ÉDITION -----------------------------------------//
    //--------------------------------------------------------------------------------------------//

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
    public function editUserAction(Request $request, $id)
    {
        // On affiche les champs du formulaire 
        $user = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgUsers')->find($id);
        return $form = $this->createForm(new SfWdgUsersType(), $user);
    } // "edit_user"     [GET] /users/{id}/edit


    /**
     * Update existing user from the submitted data or create a new user at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\CoreBundle\Form\UserType",
     *   statusCodes = {
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *   template="CoreDemoBundle:User:editUser.html.twig",
     *   templateVar="form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the user id
     *
     * @return FormTypeInterface|RouteRedirectView
     *
     * @throws NotFoundHttpException when user not exist
     */
    public function putUsersAction(Request $request, $id)
    {

        //On sélectionne l'utilisateur
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('WDGCoreBundle:SfWdgUsers')->find($id);
        //On l'associe au formulaire
        $form = $this->createForm(new SfWdgUsersType(), $user);
        $form->bind($request);

        // Si le formulaire est valide, on modifie l'utilisateur
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return  '{"message":"User modified"}';
        }

        return array(
            'form' => $form,
        );
    }


    //--------------------------------------------------------------------------------------------//
    //---------------------------------------- SUPPRESSION ---------------------------------------//
    //--------------------------------------------------------------------------------------------//

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
     *
     * @throws NotFoundHttpException when user not exist
     */
    public function deleteUsersAction(Request $request, $id)
    {
        $user = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgUsers')->find($id);
        $em = $this->getDoctrine()->getManager();
        if(!is_object($user)){
          throw $this->createNotFoundException("User does not exist.");
        }
        //On supprime l'utilisateur
        $em->remove($user);
        $em->flush();

        return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
    } // "delete_user" [DELETE] /users/{id}


    //--------------------------------------------------------------------------------------------//
    //-------------------------------------- AUTRES FONCTIONS ------------------------------------//
    //--------------------------------------------------------------------------------------------//


    public function redirectAction($entity, $code)
    {
        $view = $this->redirectView($this->generateUrl('api_user_get_user', array('id' => $entity->getId())), $code);
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