<?php

namespace WDG\CoreBundle\Controller;

use WDG\CoreBundle\Form\SfWdgProjectsType;

use WDG\CoreBundle\Entity\SfWdgProjects;

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


class ProjectRestController extends FOSRestController
{

    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- SÉLÉCTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//


    /**
     * List all projects.
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
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function getProjectsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('WDGCoreBundle:SfWdgProjects')->findAll();
        $view = $this->view($data, 200)
            ->setTemplate("WDGCoreBundle:ProjectRest:getProjects.html.twig")
            ->setTemplateVar('projects')
        ;
        return $this->handleView($view);

    } // "get_projects"     [GET] /projects


    /**
     * Get a single project.
     *
     * @ApiDoc(
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the project is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the project id
     *
     * @return array
     *
     * @throws NotFoundHttpException when project not exist
     */
    public function getProjectAction($id)
    {
        $project = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgProjects')->find($id);
        if(!is_object($project)){
          throw $this->createNotFoundException("Project does not exist.");
      }
      return $project;
    } // "get_project"      [GET] /projects/{id}


    public function getProjectwpAction($wp_project_id)
    {
        $projectwp = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgProjects')->findOneBy(array('wpProjectId' => $wp_project_id));
        if(!is_object($projectwp)){
          throw $this->createNotFoundException("Project does not exist on Wordpress.");
      }
      return $projectwp->getId();
    } // "get_project"      [GET] /projectwp/{id}


    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- INSERTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//


    /**
     * Presents the form to use to create a new project.
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
    public function newProjectsAction()
    {
        return $this->createForm(new SfWdgProjectsType());
    } // "new_projects"     [GET] /projects/new


    /**
     * Creates a new project from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\CoreBundle\Form\SfWdgProjectsType",
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

    public function postProjectsAction(Request $request)
    {
        $entity = new SfWdgProjects();
        $form = $this->createForm(new SfWdgProjectsType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
           return  $entity->getId();
        }
        return array(
            'form' => $form,
        );
    } // "post_projects"    [POST] /projects








    /**
     * Presents the form to use to update an existing project.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     200 = "Returned when successful",
     *     404 = "Returned when the project is not found"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request $request the request object
     * @param int     $id      the project id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when project not exist
     */
    public function editProjectAction(Request $request, $id)
    {
        $project = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgProjects')->find($id);
        if(!is_object($project)){
          throw $this->createNotFoundException("Project does not exist.");
        }
        $form = $this->createForm(new SfWdgProjectsType(), $project);
        return $form;
    } // "edit_project"     [GET] /projects/{id}/edit



    //--------------------------------------------------------------------------------------------//
    //------------------------------------------ ÉDITION -----------------------------------------//
    //--------------------------------------------------------------------------------------------//

    /**
     * Update existing project from the submitted data or create a new project at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\CoreBundle\Form\ProjectType",
     *   statusCodes = {
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *   template="CoreDemoBundle:Project:editProject.html.twig",
     *   templateVar="form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the project id
     *
     * @return FormTypeInterface|RouteRedirectView
     *
     * @throws NotFoundHttpException when project not exist
     */
    public function putProjectsAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository('WDGCoreBundle:SfWdgProjects')->find($id);
        $form = $this->createForm(new SfWdgProjectsType(), $project);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            return  '{"message":"Project modified"}';
        }
        return array(
            'form' => $form,
        );
    }

    //--------------------------------------------------------------------------------------------//
    //---------------------------------------- SUPPRESSION ---------------------------------------//
    //--------------------------------------------------------------------------------------------//

    /**
     * Removes a project.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes={
     *     204="Returned when successful",
     *     404="Returned when the project is not found"
     *   }
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the project id
     *
     * @return RouteRedirectView
     *
     * @throws NotFoundHttpException when project not exist
     */
    public function deleteProjectsAction(Request $request, $id)
    {
        $project = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgProjects')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($project);
        $em->flush();

        return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
    } // "delete_project" [DELETE] /projects/{id}



    //--------------------------------------------------------------------------------------------//
    //-------------------------------------- AUTRES FONCTIONS ------------------------------------//
    //--------------------------------------------------------------------------------------------//

    public function redirectAction($entity, $code)
    {
        $view = $this->redirectView($this->generateUrl('api_project_get_project', array('id' => $entity->getId())), $code);
        return $this->handleView($view);
    }

}

?>