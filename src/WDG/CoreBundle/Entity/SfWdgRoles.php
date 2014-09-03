<?php
namespace WDG\CoreBundle\Entity;
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
     * @ORM\OneToMany(targetEntity="SfWdgProjectsUsers", mappedBy="roles")
     */
    private $projectsUsers;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgOrganisationsMembers", mappedBy="roles")
     */
    private $organisationsMembers;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projectsUsers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->organisationsMembers = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set roleName
     *
     * @param string $roleName
     * @return SfWdgRoles
     */
    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;

        return $this;
    }

    /**
     * Get roleName
     *
     * @return string 
     */
    public function getRoleName()
    {
        return $this->roleName;
    }

    /**
     * Set roleSlug
     *
     * @param string $roleSlug
     * @return SfWdgRoles
     */
    public function setRoleSlug($roleSlug)
    {
        $this->roleSlug = $roleSlug;

        return $this;
    }

    /**
     * Get roleSlug
     *
     * @return string 
     */
    public function getRoleSlug()
    {
        return $this->roleSlug;
    }

    /**
     * Add projectsUsers
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers
     * @return SfWdgRoles
     */
    public function addProjectsUser(\WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers)
    {
        $this->projectsUsers[] = $projectsUsers;

        return $this;
    }

    /**
     * Remove projectsUsers
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers
     */
    public function removeProjectsUser(\WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers)
    {
        $this->projectsUsers->removeElement($projectsUsers);
    }

    /**
     * Get projectsUsers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectsUsers()
    {
        return $this->projectsUsers;
    }

    /**
     * Add organisationsMembers
     *
     * @param \WDG\CoreBundle\Entity\SfWdgOrganisationsMembers $organisationsMembers
     * @return SfWdgRoles
     */
    public function addOrganisationsMember(\WDG\CoreBundle\Entity\SfWdgOrganisationsMembers $organisationsMembers)
    {
        $this->organisationsMembers[] = $organisationsMembers;

        return $this;
    }

    /**
     * Remove organisationsMembers
     *
     * @param \WDG\CoreBundle\Entity\SfWdgOrganisationsMembers $organisationsMembers
     */
    public function removeOrganisationsMember(\WDG\CoreBundle\Entity\SfWdgOrganisationsMembers $organisationsMembers)
    {
        $this->organisationsMembers->removeElement($organisationsMembers);
    }

    /**
     * Get organisationsMembers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrganisationsMembers()
    {
        return $this->organisationsMembers;
    }

    public function __toString()
    {
        return $this->roleSlug;
    }
}
