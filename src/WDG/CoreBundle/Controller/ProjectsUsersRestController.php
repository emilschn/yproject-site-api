<?php

namespace WDG\CoreBundle\Controller;


use WDG\CoreBundle\Entity\SfWdgProjects;
use WDG\CoreBundle\Entity\SfWdgUsers;
use WDG\CoreBundle\Entity\SfWdgRoles;
use WDG\CoreBundle\Entity\SfWdgProjectsUsers;
use WDG\CoreBundle\Form\SfWdgProjectsUsersType;

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


class ProjectsUsersRestController extends FOSRestController
{

    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- SÉLÉCTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//

     /**
     * List all members.
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
    public function getMembersAction($id, Request $request)
    {
        $array = '';
        $em = $this->getDoctrine()->getManager();
        $members = $em->getRepository('WDGCoreBundle:SfWdgProjectsUsers')->findBy(array('projects' => $id));

        foreach ($members as $member) {
            $users = $em->getRepository('WDGCoreBundle:SfWdgUsers')->findOneBy(array('id' => $member->getUsers()->getId() ));
            $array[] = $users;
        }

        if(!$users) {
            throw $this->createNotFoundException("No members");
        } else {
            $view = $this->view($array, 200);
            return $this->handleView($view);
        }
    } // "get_users"     [GET] /projects/{id}/members


    public function getRolesMembersAction($idProject, $idRole, Request $request)
    {
        $array = '';
        $em = $this->getDoctrine()->getManager();
        $members = $em->getRepository('WDGCoreBundle:SfWdgProjectsUsers')->findBy(array('projects' => $idProject, 'roles' => $idRole ));

        foreach ($members as $member) {
            $users = $em->getRepository('WDGCoreBundle:SfWdgUsers')->findOneBy(array('id' => $member->getUsers()->getId() ));
            $array[] = $users;
        }

        if(!$users) {
            throw $this->createNotFoundException("No members");
        } else {
            $view = $this->view($array, 200);
            return $this->handleView($view);
        }
    } // "get_users"     [GET] /projects/{id}/members



    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- INSERTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//

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
     *   statusCode = Codes::HTTP_BAD_REQUEST
     * )
     *
     * @param Request $request the request object
     *
     * @return array
     */

    public function postMembersAction($id, Request $request)
    {

        //Entity Manager
        $em = $this->getDoctrine()->getManager();

        //Formulaire 
        $member = new SfWdgProjectsUsers();
        $form = $this->createForm(new SfWdgProjectsUsersType(), $member);
        $form->handleRequest($request);

        //Récupération des informations de l'utilisateur
        $user = new SfWdgUsers();
        $user = $form->get('users')->getData();
        $idUser = $user->getId();


        //Récuperation des informations du rôle
        $role = new SfWdgRoles();
        $role = $form->get('roles')->getData();
        $idRole = $role->getId();

        //Récupération des informations du projet ($id = id passé en paramètre de l'URL)
        $project = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgProjects')->find($id);
        

        //Ajout de la relation entre l'utilisateur, le role et le projet
        $member->setUsers($user);
        $member->setRoles($role);
        $member->setProjects($project);

        $query = $em->createQueryBuilder()
            ->select('count(m.id)')
            ->from('WDGCoreBundle:SfWdgProjectsUsers','m')
            ->where('m.users = :idUser')
            ->andWhere('m.roles = :idRole')
            ->andWhere('m.projects = :idProject')
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


    //--------------------------------------------------------------------------------------------//
    //------------------------------------------ ÉDITION -----------------------------------------//
    //--------------------------------------------------------------------------------------------//

    /**
     * Update existing relation from the submitted data or create a new relation at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\CoreBundle\Form\SfWdgProjectsUsersType",
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
/*    public function putRolesMembersAction(Request $request, $idProject, $idRole, $idMember)
    {
        //Entity Manager
        $em = $this->getDoctrine()->getManager();

        //Formulaire 
        $member = $em->getRepository('WDGCoreBundle:SfWdgProjectsUsers')->findOneBy(array('projects' => $idProject, 'users' => $idMember));
        $form = $this->createForm(new SfWdgProjectsUsersType(), $member);
        $form->bind($request);


        //Récupération des informations de l'utilisateur
        $user = new SfWdgUsers();
        $user = $form->get('users')->getData();
        $newIdUser = $user->getId();


        //Récuperation des informations du rôle
        $role = new SfWdgRoles();
        $role = $form->get('roles')->getData();
        $newIdRole = $role->getId();



            $view = $this->view($form, 200);
            return $this->handleView($view);

        //Récupération des informations du projet ($id = id passé en paramètre de l'URL)
        $project = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgProjects')->find($idProject);
        

        //Ajout de la relation entre l'utilisateur, le role et le projet
        $member->setUsers($user);
        $member->setRoles($role);
        $member->setProjects($project);
        
        if(!$member) {
            throw $this->createNotFoundException("Relation already exists.");
        }

        
        
        //Insertion en base
        $em->persist($member);
        $em->flush();
        return self::redirectAction($member, Codes::HTTP_CREATED);
          
    }*/


    //--------------------------------------------------------------------------------------------//
    //---------------------------------------- SUPPRESSION ---------------------------------------//
    //--------------------------------------------------------------------------------------------//

    /**
     * Removes a relation role/member/project.
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
    public function deleteRolesMembersAction(Request $request, $idProject, $idRole, $idMember)
    {
        //Entity Manager
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder()
            ->select('m')
            ->from('WDGCoreBundle:SfWdgProjectsUsers','m')
            ->where('m.users = :idUser')
            ->andWhere('m.roles = :idRole')
            ->andWhere('m.projects = :idProject')
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
                ->delete('WDGCoreBundle:SfWdgProjectsUsers','m')
                ->where('m.users = :idUser')
                ->andWhere('m.roles = :idRole')
                ->andWhere('m.projects = :idProject')
                ->setParameter('idUser', $idMember)
                ->setParameter('idRole', $idRole)
                ->setParameter('idProject', $idProject)
                ->getQuery();
            $deleteRelation = $query->getResult();
            return $this->routeRedirectView(null, array(), Codes::HTTP_NO_CONTENT);
        }
    } // "delete_user" [DELETE] /users/{id}

    //--------------------------------------------------------------------------------------------//
    //-------------------------------------- AUTRES FONCTIONS ------------------------------------//
    //--------------------------------------------------------------------------------------------//

    public function redirectAction($entity, $code)
    {
        $view = $this->redirectView($this->generateUrl('api_project_users_get_projects_members', array('id' => $entity->getId())), $code);
        return $this->handleView($view);
    }

/*    public function getToken($token) {
         $data = $em->getRepository('WDGCoreBundle:SfWdgToken')->findBy(array('token' => $token));
         if(!$token) {
            throw $this->createNotFoundException("Bad token!");
        }
    }*/
}
?>










