<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgProjectsUsers
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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set roles
     *
     * @param \WDG\CoreBundle\Entity\SfWdgRoles $roles
     * @return SfWdgProjectsUsers
     */
    public function setRoles(\WDG\CoreBundle\Entity\SfWdgRoles $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return \WDG\CoreBundle\Entity\SfWdgRoles 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set users
     *
     * @param \WDG\CoreBundle\Entity\SfWdgUsers $users
     * @return SfWdgProjectsUsers
     */
    public function setUsers(\WDG\CoreBundle\Entity\SfWdgUsers $users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \WDG\CoreBundle\Entity\SfWdgUsers 
     */
    public function getUsers()
    {
        return $this->users;
    }


    public function addUsers(\WDG\CoreBundle\Entity\SfWdgUsers  $users)
    {
      $this->children->add($users);
    }

    /**
     * Set projects
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjects $projects
     * @return SfWdgProjectsUsers
     */
    public function setProjects(\WDG\CoreBundle\Entity\SfWdgProjects $projects = null)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * Get projects
     *
     * @return \WDG\CoreBundle\Entity\SfWdgProjects 
     */
    public function getProjects()
    {
        return $this->projects;
    }
}
