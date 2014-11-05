<?php

namespace WDG\RestBundle\Controller;

use WDG\RestBundle\Form\BoppProjectManagementType;
use WDG\RestBundle\Entity\BoppProjectManagement;
use WDG\RestBundle\Entity\BoppRole;
use WDG\RestBundle\Entity\BoppUser;
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

class ProjectManagementController extends FOSRestController
{
    /**
     * List all members.
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
    public function getMembersAction($id, Request $request)
    {
        $array = '';
        $em = $this->getDoctrine()->getManager();
        // Select all members from a project
        $members = $em->getRepository('WDGRestBundle:BoppProjectManagement')->findBy(array('boppProject' => $id));
        if ($members) {
            foreach ($members as $member) {
                $users = $em->getRepository('WDGRestBundle:BoppUser')->findOneBy(array('id' => $member->getBoppUser()->getId() ));
                $array[] = $users;
            }

            if(!$users) {
                // Display error message
                throw $this->createNotFoundException("No members");
            } else {
                  //Display project
                $view = $this->view($array, 200);
                return $this->handleView($view);
            }
        } else {
            throw $this->createNotFoundException("No members");
        }
    }

    /**
     * Get members by role.
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
    public function getRolesMembersAction($idProject, $slugRole, Request $request)
    {
        $array = '';
        $em = $this->getDoctrine()->getManager();

        $role = $em->getRepository('WDGRestBundle:BoppRole')->findOneBy(array('role_slug' => $slugRole));
        $idRole = $role->getId();

        $members = $em->getRepository('WDGRestBundle:BoppProjectManagement')->findBy(array('boppProject' => $idProject, 'boppRole' => $idRole ));

        if(!$members) {
            throw $this->createNotFoundException("No members");
        } else {

        foreach ($members as $member) {
        $user_obj = array(
            "id" => $member->getBoppUser()->getId(), 
            "wp_user_id" => $member->getBoppUser()->getUserWpId(), 
            "user_name" => $member->getBoppUser()->getUserName(), 
            "user_surname" => $member->getBoppUser()->getUserSurname()
        );
        $array[] = $user_obj;
        }

            $view = $this->view($array, 200);
            return $this->handleView($view);
        }
    }

    /**
     * Presents the form to use to add members
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
    public function newMembersAction($id)
    {
        return $this->createForm(new BoppProjectManagementType());
    }

    /**
     * Add members from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppProjectManagementType",
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
    public function postMembersAction($id, Request $request)
    {

        //Entity Manager
        $em = $this->getDoctrine()->getManager();

        //Formulaire 
        $member = new BoppProjectManagement();
        $form = $this->createForm(new BoppProjectManagementType(), $member);
        $form->handleRequest($request);

        //Récupération des informations de l'utilisateur
        $user = new BoppUser();
        $user = $form->get('boppUser')->getData();
        $idUser = $user->getId();

        //Récuperation des informations du rôle
        $role_request = $request->request->all();
        $role_slug = $role_request["project_management"]["boppRole"];
        $role = $em->getRepository('WDGRestBundle:BoppRole')->findOneBy(array('role_slug' => $role_slug));
        $idRole = $role->getId();

        //Récupération des informations du projet ($id = id passé en paramètre de l'URL)
        $project = $this->getDoctrine()->getRepository('WDGRestBundle:BoppProject')->find($id);
        if(!$project) {
            throw $this->createNotFoundException("Project not found.");
        }
        
        //Ajout de la relation entre l'utilisateur, le role et le projet
        $member->setBoppUser($user);
        $member->setBoppRole($role);
        $member->setBoppProject($project);

        $query = $em->createQueryBuilder()
            ->select('count(m.id)')
            ->from('WDGRestBundle:BoppProjectManagement','m')
            ->where('m.boppUser = :idUser')
            ->andWhere('m.boppRole = :idRole')
            ->andWhere('m.boppProject = :idProject')
            ->setParameter('idUser', $idUser)
            ->setParameter('idRole', $idRole)
            ->setParameter('idProject', $id)
            ->getQuery();
        $countMembers = $query->getResult();
        $countRow =$countMembers[0][1];
        
        if($countRow >= 1) {
            throw $this->createNotFoundException("Relation already exists.");
        } else {
            //Insertion en base
            $em->persist($member);
            $em->flush();
            return self::redirectAction($member, Codes::HTTP_CREATED);
        }
    } // "post_users"    [POST] /users

    /**
     * Presents the form to use to update an existing members.
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
    public function editMembersAction(Request $request, $id)
    {
        $project = $this->getDoctrine()->getRepository('WDGRestBundle:BoppProjectManagement')->find($id);
        if(!is_object($project)){
            throw $this->createNotFoundException("Members does not exist.");
        }

        $form = $this->createForm(new BoppProjectManagementType(), $project);

        return $form;
    }

    /**
     * Update existing members from the submitted data or add a role to a user at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppProjectManagementType",
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
    public function patchMembersAction(Request $request, $idProject)
    {
        //Entity Manager
        $em = $this->getDoctrine()->getManager();

        //Formulaire 
        $member = $em->getRepository('WDGRestBundle:BoppProjectManagement')->findOneBy(array('boppProject' => $idProject));
        $form = $this->createForm(new BoppUserType(), $member);
        $form->submit($request, false);
        $requestAll = $request->request->all();


        //Récupération des informations de l'utilisateur
        $user_id = $requestAll["project_management"]["user"];
        $user = $this->getDoctrine()->getRepository('WDGRestBundle:BoppUser')->find($user_id);
        $newIdUser = $user->getId();

        //Récuperation des informations du nouveau rôle
        $role_slug = $requestAll["project_management"];
        $role = $em->getRepository('WDGRestBundle:BoppRole')->findOneBy(array('role_slug' => $role_slug));
        $newIdRole = $role->getId();


        //Récupération des informations du projet ($id = id passé en paramètre de l'URL)
        $project = $this->getDoctrine()->getRepository('WDGRestBundle:BoppProject')->find($idProject);
        

        //Ajout de la relation entre l'utilisateur, le role et le projet
        $member->setBoppUser($user);
        $member->setBoppRole($role);
        $member->setBoppProject($project);
        
        if(!$member) {
            throw $this->createNotFoundException("Relation already exists.");
        }

        //Insertion en base
        $em->persist($member);
        $em->flush();

        $view = $this->view($role, 200);
        return $this->handleView($view);
        return self::redirectAction($member, Codes::HTTP_CREATED);
    }

    /**
     * Removes a member in a project.
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
    public function deleteMembersAction(Request $request, $idProject, $idMember)
    {
        //Entity Manager
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder()
            ->select('m')
            ->from('WDGRestBundle:BoppProjectManagement','m')
            ->where('m.boppUser = :idUser')
            ->andWhere('m.boppProject = :idProject')
            ->setParameter('idUser', $idMember)
            ->setParameter('idProject', $idProject)
            ->getQuery();
        $idRoleQuery = $query->getResult();
        $idRole = $idRoleQuery[0]->getBoppRole()->getId();

        $query = $em->createQueryBuilder()
            ->select('m')
            ->from('WDGRestBundle:BoppProjectManagement','m')
            ->where('m.boppUser = :idUser')
            ->andWhere('m.boppRole = :idRole')
            ->andWhere('m.boppProject = :idProject')
            ->setParameter('idUser', $idMember)
            ->setParameter('idRole', $idRole)
            ->setParameter('idProject', $idProject)
            ->getQuery();
        $idRelation = $query->getResult();
        
       if(!$idRelation) {
            throw $this->createNotFoundException("Relation does not exist.");
        } else {
            //Insertion en base
            $query = $em->createQueryBuilder()
                ->delete('WDGRestBundle:BoppProjectManagement','m')
                ->where('m.boppUser = :idUser')
                ->andWhere('m.boppRole = :idRole')
                ->andWhere('m.boppProject = :idProject')
                ->setParameter('idUser', $idMember)
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
        $view = $this->redirectView($this->generateUrl('api_project_management_get_projects_members', array('id' => $entity->getId())), $code);
        return $this->handleView($view);
    }

}
