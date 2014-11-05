<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWfgProjectsUsers
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgRoles", inversedBy="projectsUsers")
     * @ORM\JoinColumn(name="sfWdgRolesId", referencedColumnName="id", nullable=false)
     */
    private $roles;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgUsers", inversedBy="projectsUsers")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", nullable=false)
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgProjects", inversedBy="projectsUsers")
     * @ORM\JoinColumn(name="sfWdgProjectsId", referencedColumnName="id")
     */
    private $projects;
}