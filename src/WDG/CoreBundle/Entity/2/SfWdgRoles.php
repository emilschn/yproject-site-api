<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgRoles
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $roleName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $roleSlug;

    /**
     * @ORM\OneToMany(targetEntity="SfWfgProjectsUsers", mappedBy="roles")
     */
    private $projectsUsers;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgOrganisationsMembers", mappedBy="roles")
     */
    private $organisationsMembers;
}