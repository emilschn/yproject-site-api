<?php

namespace WDG\CoreBundle\Controller;

use WDG\CoreBundle\Entity\SfWdgOrganisations;
use WDG\CoreBundle\Form\SfWdgOrganisationsType;

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


class OrganisationRestController extends FOSRestController
{

    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- SÉLÉCTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//

    /**
     * List all organisations.
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
    public function getOrganisationsAction(Request $request)
    {

        // Sélection des utilisateurs
        $em = $this->getDoctrine()->getManager();
        $organisations = $em->getRepository('WDGCoreBundle:SfWdgOrganisations')->findAll();

        // Si il n'y a pas d'utilisateurs, afficher un message d'erreur
        if(!$organisations){
          throw $this->createNotFoundException("No organisation");
        }

        //Sinon afficher les utilisateurs 
        $view = $this->view($organisations, 200);
        return $this->handleView($view);

    } // "get_organisations"     [GET] /organisations

    /**
     * Get a single organisation.
     *
     * @ApiDoc(
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the organisation is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the organisation id
     *
     * @return array
     *
     * @throws NotFoundHttpException when organisation not exist
     */
    public function getOrganisationAction($id, Request $request)
    {
        // Sélection de l'utilisateur
        $organisation = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgOrganisations')->find($id);

        // Si il n'y a pas d'utilisateur, afficher un message d'erreur
        if(!is_object($organisation)){
          throw $this->createNotFoundException("Organisation does not exist.");
        }
        //Sinon afficher les utilisateurs 
        $view = $this->view($organisation, 200);
        return $this->handleView($view);
    } // "get_organisation"      [GET] /organisations/{id}



    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- INSERTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//

    /**
     * Presents the form to use to create a new organisation.
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
    public function newOrganisationsAction()
    {
        // Affiche les champs du formulaire
        return $this->createForm(new SfWdgOrganisationsType());
    } // "new_organisations"     [GET] /organisations/new


    /**
     * Creates a new organisation from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\CoreBundle\Form\SfWdgOrganisationsType",
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

    public function postOrganisationsAction(Request $request)
    {
        $entity = new SfWdgOrganisations();
        $form = $this->createForm(new SfWdgOrganisationsType(), $entity);
        $form->bind($request);

        // Si le formulaire est valide, on ajoute l'utilisateur
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }
        return array(
            'form' => $form,
        );
    } // "post_organisations"    [POST] /organisations


    //--------------------------------------------------------------------------------------------//
    //------------------------------------------ ÉDITION -----------------------------------------//
    //--------------------------------------------------------------------------------------------//

    /**
     * Presents the form to use to update an existing organisation.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     200 = "Returned when successful",
     *     404 = "Returned when the organisation is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the organisation id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when organisation not exist
     */
    public function editOrganisationAction(Request $request, $id)
    {
        // On affiche les champs du formulaire 
        $organisation = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgOrganisations')->find($id);
        return $form = $this->createForm(new SfWdgOrganisationsType(), $organisation);
    } // "edit_organisation"     [GET] /organisations/{id}/edit


    /**
     * Update existing organisation from the submitted data or create a new organisation at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\CoreBundle\Form\OrganisationType",
     *   statusCodes = {
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *   template="CoreDemoBundle:Organisation:editOrganisation.html.twig",
     *   templateVar="form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the organisation id
     *
     * @return FormTypeInterface|RouteRedirectView
     *
     * @throws NotFoundHttpException when organisation not exist
     */
    public function putOrganisationsAction(Request $request, $id)
    {

        //On sélectionne l'utilisateur
        $em = $this->getDoctrine()->getManager();
        $organisation = $em->getRepository('WDGCoreBundle:SfWdgOrganisations')->find($id);
        //On l'associe au formulaire
        $form = $this->createForm(new SfWdgOrganisationsType(), $organisation);
        $form->bind($request);

        // Si le formulaire est valide, on modifie l'utilisateur
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($organisation);
            $em->flush();
        }

        return array(
            'form' => $form,
        );
    }


    //--------------------------------------------------------------------------------------------//
    //---------------------------------------- SUPPRESSION ---------------------------------------//
    //--------------------------------------------------------------------------------------------//

    /**
     * Removes a organisation.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     204="Returned when successful",
     *     404="Returned when the organisation is not found"
     *   }
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the organisation id
     *
     * @return RouteRedirectView
     *
     * @throws NotFoundHttpException when organisation not exist
     */
    public function deleteOrganisationsAction(Request $request, $id)
    {
        $organisation = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgOrganisations')->find($id);
        $em = $this->getDoctrine()->getManager();
        if(!is_object($organisation)){
          throw $this->createNotFoundException("Organisation does not exist.");
        }
        //On supprime l'utilisateur
        $em->remove($organisation);
        $em->flush();

        return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
    } // "delete_organisation" [DELETE] /organisations/{id}


    //--------------------------------------------------------------------------------------------//
    //-------------------------------------- AUTRES FONCTIONS ------------------------------------//
    //--------------------------------------------------------------------------------------------//


    public function redirectAction($entity, $code)
    {
        $view = $this->redirectView($this->generateUrl('api_organisation_get_organisation', array('id' => $entity->getId())), $code);
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