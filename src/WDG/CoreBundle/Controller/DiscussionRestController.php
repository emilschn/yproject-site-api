<?php

namespace WDG\CoreBundle\Controller;


use WDG\CoreBundle\Entity\SfWdgProjects;
use WDG\CoreBundle\Entity\SfWdgDiscussions;
use WDG\CoreBundle\Form\SfWdgDiscussionsType;

use Doctrine\ORM\Mapping as ORM;

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


class DiscussionRestController extends FOSRestController
{

    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- SÉLÉCTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//

     /**
     * List all discussions.
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
     * @param Request                   $request            the request object
     * @param ParamFetcherInterface     $paramFetcher       param fetcher service
     *
     * @return array
     */
    public function getDiscussionsAction($idProject, Request $request)
    {
        $array = '';
        $em = $this->getDoctrine()->getManager();
        $discussions = $em->getRepository('WDGCoreBundle:SfWdgDiscussions')->findBy(array('projects' => $idProject));

       if(!$discussions){
          throw $this->createNotFoundException("No discussion");
        }

        //Sinon afficher les utilisateurs 
        $view = $this->view($discussions, 200);
        return $this->handleView($view);
    } // "get_discussions"     [GET] /projects/{id}/discussions

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
    public function getDiscussionAction($idProject, $idDiscussion, Request $request)
    {
        // Sélection de la discussion
        $discussion = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgDiscussions')->find($idDiscussion);

        // Si il n'y a pas d'utilisateur, afficher un message d'erreur
        if(!is_object($discussion)){
          throw $this->createNotFoundException("Discussion does not exist.");
        }
        //Sinon afficher les utilisateurs 
        $view = $this->view($discussion, 200);
        return $this->handleView($view);
    } // "get_discussion"      [GET] /discussions/{id}

  //--------------------------------------------------------------------------------------------//
    //----------------------------------------- INSERTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//

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
    public function newDiscussionsAction()
    {
        // Affiche les champs du formulaire
        return $this->createForm(new SfWdgDiscussionsType());
    } // "new_discussions"     [GET] /discussions/new


    /**
     * Creates a new discussion from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\CoreBundle\Form\SfWdgDiscussionsType",
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

    public function postDiscussionsAction(Request $request, $idProject)
    {
        $discussion = new SfWdgDiscussions();

        //Récupération des informations du projet ($idProject = id passé en paramètre de l'URL)
        $project = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgProjects')->find($idProject);
        if(!$project) {
            throw $this->createNotFoundException("Project not found.");
        }
        $form = $this->createForm(new SfWdgDiscussionsType(), $discussion);
        $form->bind($request);

        // Si le formulaire est valide, on ajoute la discussion
        if ($form->isValid()) {
            $discussion->setProjects($project);
            $em = $this->getDoctrine()->getManager();
            $em->persist($discussion);
            $em->flush();
            return  $discussion->getId();
        }
        return array(
            'form' => $form,
        );
    } // "post_discussions"    [POST] /discussions


    //--------------------------------------------------------------------------------------------//
    //------------------------------------------ ÉDITION -----------------------------------------//
    //--------------------------------------------------------------------------------------------//

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
    public function editDiscussionsAction(Request $request, $idProject, $idDiscussion)
    {
        // On affiche les champs du formulaire 
        $discussion = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgDiscussions')->find($id);
        return $form = $this->createForm(new SfWdgDiscussionsType(), $discussion);
    } // "edit_discussion"     [GET] /discussions/{id}/edit


    /**
     * Update existing discussion from the submitted data or create a new discussion at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\CoreBundle\Form\DiscussionType",
     *   statusCodes = {
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *   template="CoreDemoBundle:Discussion:editDiscussion.html.twig",
     *   templateVar="form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the discussion id
     *
     * @return FormTypeInterface|RouteRedirectView
     *
     * @throws NotFoundHttpException when discussion not exist
     */
    public function putDiscussionsAction(Request $request, $idProject, $idDiscussion)
    {

        //On sélectionne la discussion
        $em = $this->getDoctrine()->getManager();
        $discussion = $em->getRepository('WDGCoreBundle:SfWdgDiscussions')->find($id);
        //On l'associe au formulaire
        $form = $this->createForm(new SfWdgDiscussionsType(), $discussion);
        $form->bind($request);

        // Si le formulaire est valide, on modifie la discussion
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($discussion);
            $em->flush();
            return  '{"message":"Discussion modified"}';
        }

        return array(
            'form' => $form,
        );
    }


    //--------------------------------------------------------------------------------------------//
    //---------------------------------------- SUPPRESSION ---------------------------------------//
    //--------------------------------------------------------------------------------------------//

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
     *
     * @throws NotFoundHttpException when discussion not exist
     */
    public function deleteDiscussionsAction(Request $request, $idProject, $idDiscussion)
    {
        $discussion = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgDiscussions')->findOneBy(array('id' => $member->getUsers()->getId() ));
        $em = $this->getDoctrine()->getManager();
        if(!is_object($discussion)){
          throw $this->createNotFoundException("Discussion does not exist.");
        }
        //On supprime la discussion
        $em->remove($discussion);
        $em->flush();

        return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
    } // "delete_discussion" [DELETE] /discussions/{id}


    //--------------------------------------------------------------------------------------------//
    //-------------------------------------- AUTRES FONCTIONS ------------------------------------//
    //--------------------------------------------------------------------------------------------//


    public function redirectAction($entity, $code)
    {
        $view = $this->redirectView($this->generateUrl('api_discussion_get_discussion', array('id' => $entity->getId())), $code);
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