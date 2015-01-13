<?php

namespace WDG\RestBundle\Controller;

use WDG\RestBundle\Form\BoppProjectOrganisationManagementType;
use WDG\RestBundle\Entity\BoppProjectOrganisationManagement;
use WDG\RestBundle\Entity\BoppRole;
use WDG\RestBundle\Entity\BoppOrganisation;
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

class ProjectOrganisationManagementController extends FOSRestController
{
    /**
     * List all organisations.
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
    public function getOrganisationsAction($id, Request $request)
    {
        $array = '';
        $em = $this->getDoctrine()->getManager();
        // Select all members from a project
        $management_objects = $em->getRepository('WDGRestBundle:BoppProjectOrganisationManagement')->findBy(array('boppProject' => $id));
        if ($management_objects) {
            foreach ($management_objects as $management_object) {
                $organisation = $em->getRepository('WDGRestBundle:BoppOrganisation')->findOneBy(array('id' => $management_object->getBoppOrganisation()->getId() ));
                $array[] = $organisation;
            }

            if(!$organisation) {
                // Display error message
                throw $this->createNotFoundException("No organisations");
            } else {
                  //Display project
                $view = $this->view($array, 200);
                return $this->handleView($view);
            }
        } else {
            throw $this->createNotFoundException("No organisations");
        }
    }

    /**
     * Get organisations by role.
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
    public function getRolesOrganisationsAction($idProject, $slugRole, Request $request)
    {
        $array = '';
        $em = $this->getDoctrine()->getManager();

        $role = $em->getRepository('WDGRestBundle:BoppRole')->findOneBy(array('role_slug' => $slugRole));
        $idRole = $role->getId();

        $management_objects = $em->getRepository('WDGRestBundle:BoppProjectOrganisationManagement')->findBy(array('boppProject' => $idProject, 'boppRole' => $idRole ));

        if(!$management_objects) {
            throw $this->createNotFoundException("No organisations");
        } else {

	    foreach ($management_objects as $management_object) {
		$organisation_object = array(
		    "id" => $management_object->getBoppUser()->getId(), 
		    "wp_user_id" => $management_object->getBoppOrganisation()->getUserWpId(), 
		    "user_name" => $management_object->getBoppOrganisation()->getUserName(), 
		    "user_surname" => $management_object->getBoppOrganisation()->getUserSurname()
		);
		$array[] = $organisation_object;
	    }

            $view = $this->view($array, 200);
            return $this->handleView($view);
        }
    }

    /**
     * Presents the form to use to add organisations
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
    public function newOrganisationsAction($id)
    {
        return $this->createForm(new BoppProjectOrganisationManagementType());
    }

    /**
     * Add an organisation from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppProjectOrganisationManagementType",
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
    public function postOrganisationsAction($id, Request $request)
    {

        //Entity Manager
        $em = $this->getDoctrine()->getManager();

        //Formulaire 
        $management = new BoppProjectOrganisationManagement();
        $form = $this->createForm(new BoppProjectOrganisationManagementType(), $management);
        $form->handleRequest($request);

        //Récupération des informations de l'organisation
        $organisation = $form->get('boppOrganisation')->getData();
        $idOrganisation = $organisation->getId();

        //Récuperation des informations du rôle
        $role_request = $request->request->all();
        $role_slug = $role_request["project_organisation_management"]["boppRole"];
        $role = $em->getRepository('WDGRestBundle:BoppRole')->findOneBy(array('role_slug' => $role_slug));
        $idRole = $role->getId();

        //Récupération des informations du projet ($id = id passé en paramètre de l'URL)
        $project = $this->getDoctrine()->getRepository('WDGRestBundle:BoppProject')->find($id);
        if(!$project) {
            throw $this->createNotFoundException("Project not found.");
        }
        
        //Ajout de la relation entre l'utilisateur, le role et le projet
        $management->setBoppOrganisation($organisation);
        $management->setBoppRole($role);
        $management->setBoppProject($project);

        $query = $em->createQueryBuilder()
            ->select('count(m.id)')
            ->from('WDGRestBundle:BoppProjectOrganisationManagement','m')
            ->where('m.boppOrganisation = :idOrganisation')
            ->andWhere('m.boppRole = :idRole')
            ->andWhere('m.boppProject = :idProject')
            ->setParameter('idOrganisation', $idOrganisation)
            ->setParameter('idRole', $idRole)
            ->setParameter('idProject', $id)
            ->getQuery();
        $countMembers = $query->getResult();
        $countRow =$countMembers[0][1];
        
        if($countRow >= 1) {
            throw $this->createNotFoundException("Relation already exists.");
        } else {
            //Insertion en base
            $em->persist($management);
            $em->flush();
            return self::redirectAction($management, Codes::HTTP_CREATED);
        }
    } // "post_organisation"    [POST] /organisations

    /**
     * Presents the form to use to update an existing organisation.
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
    public function editOrganisationsAction(Request $request, $id)
    {
        $management = $this->getDoctrine()->getRepository('WDGRestBundle:BoppProjectOrganisationManagement')->find($id);
        if(!is_object($management)){
            throw $this->createNotFoundException("Organisation does not exist.");
        }

        $form = $this->createForm(new BoppProjectOrganisationManagementType(), $management);

        return $form;
    }

    /**
     * Update existing organisations from the submitted data or add a role to an organisation at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppProjectOrganisationManagementType",
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
    public function patchOrganisationsAction(Request $request, $idProject)
    {
        //Entity Manager
        $em = $this->getDoctrine()->getManager();

        //Formulaire 
        $management = $em->getRepository('WDGRestBundle:BoppProjectOrganisationManagement')->findOneBy(array('boppProject' => $idProject));
        $form = $this->createForm(new BoppOrganisationType(), $management);
        $form->submit($request, false);
        $requestAll = $request->request->all();


        //Récupération des informations de l'organisation
        $organisation_id = $requestAll["project_organisation_management"]["organisation"];
        $organisation = $this->getDoctrine()->getRepository('WDGRestBundle:BoppOrganisation')->find($organisation_id);
        $newIdOrganisation = $organisation->getId();

        //Récuperation des informations du nouveau rôle
        $role_slug = $requestAll["project_organisation_management"];
        $role = $em->getRepository('WDGRestBundle:BoppRole')->findOneBy(array('role_slug' => $role_slug));
        $newIdRole = $role->getId();


        //Récupération des informations du projet ($id = id passé en paramètre de l'URL)
        $project = $this->getDoctrine()->getRepository('WDGRestBundle:BoppProject')->find($idProject);
        

        //Ajout de la relation entre l'utilisateur, le role et le projet
        $management->setBoppOrganisation($organisation);
        $management->setBoppRole($role);
        $management->setBoppProject($project);
        
        if(!$management) {
            throw $this->createNotFoundException("Relation already exists.");
        }

        //Insertion en base
        $em->persist($management);
        $em->flush();

        $view = $this->view($role, 200);
        return $this->handleView($view);
    }

    /**
     * Removes an organisation in a project.
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
    public function deleteOrganisationsAction(Request $request, $idProject, $idOrganisation)
    {
        //Entity Manager
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder()
            ->select('m')
            ->from('WDGRestBundle:BoppProjectOrganisationManagement','m')
            ->where('m.boppOrganisation = :idOrganisation')
            ->andWhere('m.boppProject = :idProject')
            ->setParameter('idOrganisation', $idOrganisation)
            ->setParameter('idProject', $idProject)
            ->getQuery();
        $idRoleQuery = $query->getResult();
	if (count($idRoleQuery)) {
	    $idRole = $idRoleQuery[0]->getBoppRole()->getId();
	    
	    $query = $em->createQueryBuilder()
		->select('m')
		->from('WDGRestBundle:BoppProjectOrganisationManagement','m')
		->where('m.boppOrganisation = :idOrganisation')
		->andWhere('m.boppRole = :idRole')
		->andWhere('m.boppProject = :idProject')
		->setParameter('idOrganisation', $idOrganisation)
		->setParameter('idRole', $idRole)
		->setParameter('idProject', $idProject)
		->getQuery();
	    $idRelation = $query->getResult();
	}
        
       if(!$idRelation) {
            throw $this->createNotFoundException("Relation does not exist.");
        } else {
            //Insertion en base
            $query = $em->createQueryBuilder()
                ->delete('WDGRestBundle:BoppProjectOrganisationManagement','m')
                ->where('m.boppOrganisation = :idOrganisation')
                ->andWhere('m.boppRole = :idRole')
                ->andWhere('m.boppProject = :idProject')
                ->setParameter('idOrganisation', $idOrganisation)
                ->setParameter('idRole', $idRole)
                ->setParameter('idProject', $idProject)
                ->getQuery();
            $deleteRelation = $query->getResult();
            return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
        }
    }





    //--------------------------------------------------------------------------------------------//
    //-------------------------------------- AUTRES FONCTIONS ------------------------------------//
    //--------------------------------------------------------------------------------------------//

    public function redirectAction($entity, $code)
    {
        $view = $this->redirectView($this->generateUrl('api_project_organisation_management_get_projects_organisations', array('id' => $entity->getId())), $code);
        return $this->handleView($view);
    }

}
