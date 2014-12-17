<?php

namespace WDG\RestBundle\Controller;

use WDG\RestBundle\Form\BoppOrganisationType;
use WDG\RestBundle\Entity\BoppOrganisation;

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

class OrganisationController extends FOSRestController
{
    /**
     * List all organisations.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     * 	   404 = "Returned when there is no organisation"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request               $request      the request object
     *
     * @return array
     */
    public function getOrganisationsAction(Request $request)
    {
        // Select all organisations
        $em = $this->getDoctrine()->getManager();
        $organisations = $em->getRepository('WDGRestBundle:BoppOrganisation')->findAll();

        // No organisation
        if(!$organisations){
          throw $this->createNotFoundException("No organisation");
        }

        //Display organisation
        $view = $this->view($organisations, 200);
        return $this->handleView($view);
    }

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
    public function getOrganisationAction(Request $request, $id)
    {
        
        $organisation = $this->getDoctrine()->getRepository('WDGRestBundle:BoppOrganisation')->find($id);
        if(!is_object($organisation)){
            throw $this->createNotFoundException("Organisation does not exist.");
        }

        $view = $this->view($organisation, 200);
        return $this->handleView($view);

        return $view;
    }

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
    public function newOrganisationAction()
    {
        return $this->createForm(new BoppOrganisationType());
    }

    /**
     * Creates a new organisation from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppOrganisationType",
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
    public function postOrganisationsAction(Request $request)
    {
        $organisation = new BoppOrganisation();
        $form = $this->createForm(new BoppOrganisationType(), $organisation);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($organisation);
            $em->flush();
            return $organisation->getId();
        }

        return array(
            'form' => $form
        );
    }

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
    public function editOrganisationsAction(Request $request, $id)
    {
        $organisation = $this->getDoctrine()->getRepository('WDGRestBundle:BoppOrganisation')->find($id);
        if(!is_object($organisation)){
            throw $this->createNotFoundException("Organisation does not exist.");
        }

        $form = $this->createForm(new BoppOrganisationType(), $organisation);

        return $form;
    }

    /**
     * Update existing organisation from the submitted data or create a new organisation at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppOrganisationType",
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
     * @param int     $id      the organisation id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when organisation not exist
     */
    public function patchOrganisationsAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
        $organisation = $em->getRepository('WDGRestBundle:BoppOrganisation')->find($id);
        if (false === $organisation) {
            $organisation = new BoppOrganisation();
            $organisation->id = $id;
            $statusCode = Codes::HTTP_CREATED;
        } else {
            $statusCode = Codes::HTTP_NO_CONTENT;
        }

        $form = $this->createForm(new BoppOrganisationType(), $organisation);
        $form->submit($request, false);
       
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return  "{'message':'Organisation modified','status':'".$statusCode."'}";
        }
        return array(
            'form' => $form,
        );
    }

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
     */
    public function deleteOrganisationsAction(Request $request, $id)
    {
		$organisation = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgOrganisations')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($organisation);
        $em->flush();

        return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
    }

}
