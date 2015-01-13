<?php

namespace WDG\RestBundle\Controller;

use WDG\RestBundle\Form\BoppOrganisationManagementType;
use WDG\RestBundle\Entity\BoppOrganisationManagement;
use WDG\RestBundle\Entity\BoppRole;
use WDG\RestBundle\Entity\BoppUser;
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

class OrganisationManagementController extends FOSRestController
{
    /**
     * List all members.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when there is no organisation"
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
        // Select all members from a organisation
        $members = $em->getRepository('WDGRestBundle:BoppOrganisationManagement')->findBy(array('boppOrganisation' => $id));
        if ($members) {
            foreach ($members as $member) {
                $users = $em->getRepository('WDGRestBundle:BoppUser')->findOneBy(array('id' => $member->getBoppUser()->getId() ));
                $array[] = $users;
            }

            if(!$users) {
                // Display error message
                throw $this->createNotFoundException("No members");
            } else {
                  //Display organisation
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
    public function getRolesMembersAction($idOrganisation, $slugRole, Request $request)
    {
        $array = '';
        $em = $this->getDoctrine()->getManager();

        $role = $em->getRepository('WDGRestBundle:BoppRole')->findOneBy(array('role_slug' => $slugRole));
        $idRole = $role->getId();

        $members = $em->getRepository('WDGRestBundle:BoppOrganisationManagement')->findBy(array('boppOrganisation' => $idOrganisation, 'boppRole' => $idRole ));

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
        return $this->createForm(new BoppOrganisationManagementType());
    }

    /**
     * Add members from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppOrganisationManagementType",
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
        $member = new BoppOrganisationManagement();
        $form = $this->createForm(new BoppOrganisationManagementType(), $member);
        $form->handleRequest($request);

        //Récupération des informations de l'utilisateur
        $user = new BoppUser();
        $user = $form->get('boppUser')->getData();
        $idUser = $user->getId();

        //Récuperation des informations du rôle
        $role_request = $request->request->all();
        $role_slug = $role_request["organisation_management"]["boppRole"];
        $role = $em->getRepository('WDGRestBundle:BoppRole')->findOneBy(array('role_slug' => $role_slug));
        $idRole = $role->getId();

        //Récupération des informations du projet ($id = id passé en paramètre de l'URL)
        $organisation = $this->getDoctrine()->getRepository('WDGRestBundle:BoppOrganisation')->find($id);
        if(!$organisation) {
            throw $this->createNotFoundException("Organisation not found.");
        }
        
        //Ajout de la relation entre l'utilisateur, le role et le projet
        $member->setBoppUser($user);
        $member->setBoppRole($role);
        $member->setBoppOrganisation($organisation);

        $query = $em->createQueryBuilder()
            ->select('count(m.id)')
            ->from('WDGRestBundle:BoppOrganisationManagement','m')
            ->where('m.boppUser = :idUser')
            ->andWhere('m.boppRole = :idRole')
            ->andWhere('m.boppOrganisation = :idOrganisation')
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

    /**
     * Presents the form to use to update an existing members.
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
    public function editMembersAction(Request $request, $id)
    {
        $organisation = $this->getDoctrine()->getRepository('WDGRestBundle:BoppOrganisationManagement')->find($id);
        if(!is_object($organisation)){
            throw $this->createNotFoundException("Members does not exist.");
        }

        $form = $this->createForm(new BoppOrganisationManagementType(), $organisation);

        return $form;
    }

    /**
     * Update existing members from the submitted data or add a role to a user at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "WDG\RestBundle\Form\BoppOrganisationManagementType",
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
    public function patchMembersAction(Request $request, $idOrganisation)
    {
        //Entity Manager
        $em = $this->getDoctrine()->getManager();

        //Formulaire 
        $member = $em->getRepository('WDGRestBundle:BoppOrganisationManagement')->findOneBy(array('boppOrganisation' => $idOrganisation));
        $form = $this->createForm(new BoppUserType(), $member);
        $form->submit($request, false);
        $requestAll = $request->request->all();


        //Récupération des informations de l'utilisateur
        $user_id = $requestAll["organisation_management"]["user"];
        $user = $this->getDoctrine()->getRepository('WDGRestBundle:BoppUser')->find($user_id);
        $newIdUser = $user->getId();

        //Récuperation des informations du nouveau rôle
        $role_slug = $requestAll["organisation_management"];
        $role = $em->getRepository('WDGRestBundle:BoppRole')->findOneBy(array('role_slug' => $role_slug));
        $newIdRole = $role->getId();


        //Récupération des informations du projet ($id = id passé en paramètre de l'URL)
        $organisation = $this->getDoctrine()->getRepository('WDGRestBundle:BoppOrganisation')->find($idOrganisation);
        

        //Ajout de la relation entre l'utilisateur, le role et le projet
        $member->setBoppUser($user);
        $member->setBoppRole($role);
        $member->setBoppOrganisation($organisation);
        
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
     * Removes a member in a organisation.
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
    public function deleteMembersAction(Request $request, $idOrganisation, $idMember)
    {
        //Entity Manager
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder()
            ->select('m')
            ->from('WDGRestBundle:BoppOrganisationManagement','m')
            ->where('m.boppUser = :idUser')
            ->andWhere('m.boppOrganisation = :idOrganisation')
            ->setParameter('idUser', $idMember)
            ->setParameter('idOrganisation', $idOrganisation)
            ->getQuery();
        $idRoleQuery = $query->getResult();
        $idRole = $idRoleQuery[0]->getBoppRole()->getId();

        $query = $em->createQueryBuilder()
            ->select('m')
            ->from('WDGRestBundle:BoppOrganisationManagement','m')
            ->where('m.boppUser = :idUser')
            ->andWhere('m.boppRole = :idRole')
            ->andWhere('m.boppOrganisation = :idOrganisation')
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
                ->delete('WDGRestBundle:BoppOrganisationManagement','m')
                ->where('m.boppUser = :idUser')
                ->andWhere('m.boppRole = :idRole')
                ->andWhere('m.boppOrganisation = :idOrganisation')
                ->setParameter('idUser', $idMember)
                ->setParameter('idRole', $idRole)
                ->setParameter('idOrganisation', $idOrganisation)
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
        $view = $this->redirectView($this->generateUrl('api_organisation_management_get_organisations_members', array('id' => $entity->getId())), $code);
        return $this->handleView($view);
    }

}
