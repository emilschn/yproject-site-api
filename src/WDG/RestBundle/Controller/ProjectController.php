<?php

namespace WDG\RestBundle\Controller;

use WDG\RestBundle\Form\BoppProjectType;
use WDG\RestBundle\Entity\BoppProject;

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

class ProjectController extends FOSRestController
{
    /**
     * List all projects.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     * 	   404 = "Returned when there is no project"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @param Request               $request      the request object
     *
     * @return array
     */
    public function getProjectsAction(Request $request)
    {
        // Select all projects
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('WDGRestBundle:BoppProject')->findAll();

        // No project
        if(!$users){
          throw $this->createNotFoundException("No project");
        }

        //Display project
        $view = $this->view($users, 200);
        return $this->handleView($view);
    }

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
    public function getProjectAction(Request $request, $id)
    {
        
        $project = $this->getDoctrine()->getRepository('WDGRestBundle:BoppProject')->find($id);
        if(!is_object($project)){
            throw $this->createNotFoundException("Project does not exist.");
        }

        $view = $this->view($project, 200);
        return $this->handleView($view);

        return $view;
    }

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
    public function newProjectAction()
    {
        return $this->createForm(new BoppProjectType());
    }

    /**
     * Creates a new project from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppProjectType",
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
    public function postProjectsAction(Request $request)
    {
        $project = new BoppProject();
        $form = $this->createForm(new BoppProjectType(), $project);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            return $project->getId();
        }

        return array(
            'form' => $form
        );
    }

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
    public function editProjectsAction(Request $request, $id)
    {
        $project = $this->getDoctrine()->getRepository('WDGRestBundle:BoppProject')->find($id);
        if(!is_object($project)){
            throw $this->createNotFoundException("Project does not exist.");
        }

        $form = $this->createForm(new BoppProjectType(), $project);

        return $form;
    }

    /**
     * Update existing project from the submitted data or create a new project at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppProjectType",
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
     * @param int     $id      the project id
     *
     * @return FormTypeInterface
     *
     * @throws NotFoundHttpException when project not exist
     */
    public function patchProjectsAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
        $project = $em->getRepository('WDGRestBundle:BoppProject')->find($id);
        if (false === $project) {
            $project = new BoppProject();
            $project->id = $id;
            $statusCode = Codes::HTTP_CREATED;
        } else {
            $statusCode = Codes::HTTP_NO_CONTENT;
        }

        $form = $this->createForm(new BoppProjectType(), $project);
        $form->submit($request, false);
       
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return  "{'message':'Project modified','status':'".$statusCode."','method':'".$_SERVER['REQUEST_METHOD']."'}";
        }
        return array(
            'form' => $form,
        );
    }

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
     */
    public function deleteProjectsAction(Request $request, $id)
    {
		$project = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgProjects')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($project);
        $em->flush();

        return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
    }

}
