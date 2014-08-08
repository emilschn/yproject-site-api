<?php

namespace WDG\CoreBundle\Controller;


use WDG\CoreBundle\Entity\SfWdgOrganisations;
use WDG\CoreBundle\Entity\SfWdgUsers;
use WDG\CoreBundle\Entity\SfWdgRoles;
use WDG\CoreBundle\Entity\SfWdgOrganisationsMembers;
use WDG\CoreBundle\Form\SfWdgOrganisationsMembersType;

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


class OrganisationsUsersRestController extends FOSRestController
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
        $members = $em->getRepository('WDGCoreBundle:SfWdgOrganisationsMembers')->findBy(array('organisations' => $id));
        if ($members) {
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
        } else {
            throw $this->createNotFoundException("No members");
        }
    } // "get_users"     [GET] /organisations/{id}/members


    public function getRolesMembersAction($idOrganisation, $idRole, Request $request)
    {
        $array = '';
        $em = $this->getDoctrine()->getManager();
        $members = $em->getRepository('WDGCoreBundle:SfWdgOrganisationsMembers')->findBy(array('organisations' => $idOrganisation, 'roles' => $idRole ));

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
    } // "get_users"     [GET] /organisations/{id}/members



    //--------------------------------------------------------------------------------------------//
    //----------------------------------------- INSERTION ----------------------------------------//
    //--------------------------------------------------------------------------------------------//

    public function newMembersAction($id)
    {
        // Affiche les champs du formulaire
        return $this->createForm(new SfWdgOrganisationsMembersType());
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
        $member = new SfWdgOrganisationsMembers();
        $form = $this->createForm(new SfWdgOrganisationsMembersType(), $member);

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
        $organisation = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgOrganisations')->find($id);
        if(!$project) {
            throw $this->createNotFoundException("Organisation not found.");
        }
        

        //Ajout de la relation entre l'utilisateur, le role et le projet
        $member->setUsers($user);
        $member->setRoles($role);
        $member->setOrganisations($organisation);

        $query = $em->createQueryBuilder()
            ->select('count(m.id)')
            ->from('WDGCoreBundle:SfWdgOrganisationsMembers','m')
            ->where('m.users = :idUser')
            ->andWhere('m.roles = :idRole')
            ->andWhere('m.organisations = :idOrganisation')
            ->setParameter('idUser', $idUser)
            ->setParameter('idRole', $idRole)
            ->setParameter('idOrganisation', $id)
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
     *   input = "WDG\CoreBundle\Form\SfWdgOrganisationsMembersType",
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
    public function putRolesMembersAction(Request $request, $idOrganisation, $idRole, $idMember)
    {
        //Entity Manager
        $em = $this->getDoctrine()->getManager();

        //Formulaire 
        $member = $em->getRepository('WDGCoreBundle:SfWdgOrganisationsMembers')->findOneBy(array('organisations' => $idOrganisation, 'users' => $idMember));
        $form = $this->createForm(new SfWdgOrganisationsMembersType(), $member);
        $form->bind($request);
       

        //Récuperation des informations du nouveau rôle
        $role = new SfWdgRoles();
        $role = $form->get('roles')->getData();
        //$newIdRole = $role->getId();



        //Récupération des informations de l'utilisateur
        $user = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgUsers')->find($idMember);
        $newIdUser = $user->getId();

        //Récupération des informations du projet ($id = id passé en paramètre de l'URL)
        $organisation = $this->getDoctrine()->getRepository('WDGCoreBundle:SfWdgOrganisations')->find($idOrganisation);
        

        //Ajout de la relation entre l'utilisateur, le role et le projet
        $member->setUsers($user);
        $member->setRoles($role);
        $member->setOrganisations($organisation);
        
        if(!$member) {
            throw $this->createNotFoundException("Relation already exists.");
        }

        //Insertion en base
        $em->persist($member);
        $em->flush();
        return self::redirectAction($member, Codes::HTTP_CREATED);          
    }


    //--------------------------------------------------------------------------------------------//
    //---------------------------------------- SUPPRESSION ---------------------------------------//
    //--------------------------------------------------------------------------------------------//

    /**
     * Removes a relation role/member/organisation.
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
    public function deleteRolesMembersAction(Request $request, $idOrganisation, $idRole, $idMember)
    {
        //Entity Manager
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder()
            ->select('m')
            ->from('WDGCoreBundle:SfWdgOrganisationsMembers','m')
            ->where('m.users = :idUser')
            ->andWhere('m.roles = :idRole')
            ->andWhere('m.organisations = :idOrganisation')
            ->setParameter('idUser', $idMember)
            ->setParameter('idRole', $idRole)
            ->setParameter('idOrganisation', $idOrganisation)
            ->getQuery();
        $idRelation = $query->getResult();
        
       if(!$idRelation) {
            throw $this->createNotFoundException("Relation does not exist.");
        } else {
            //Insertion en base
            $query = $em->createQueryBuilder()
                ->delete('WDGCoreBundle:SfWdgOrganisationsMembers','m')
                ->where('m.users = :idUser')
                ->andWhere('m.roles = :idRole')
                ->andWhere('m.organisations = :idOrganisation')
                ->setParameter('idUser', $idMember)
                ->setParameter('idRole', $idRole)
                ->setParameter('idOrganisation', $idOrganisation)
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
        $view = $this->redirectView($this->generateUrl(' api_organisations_users_get_organisations_roles_members', array('id' => $entity->getId())), $code);
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










