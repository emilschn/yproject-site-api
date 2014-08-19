<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgOrganisationsMembers
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgUsers", inversedBy="organisationsMembers")
     * @ORM\JoinColumn(name="SfWdgUsersId", referencedColumnName="id")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgOrganisations", inversedBy="organisationsMembers")
     * @ORM\JoinColumn(name="SfWdgOrganisationsId", referencedColumnName="id")
     */
    private $organisations;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgRoles", inversedBy="organisationsMembers")
     * @ORM\JoinColumn(name="SfWdgRolesId", referencedColumnName="id")
     */
    private $roles;

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
     * Set users
     *
     * @param \WDG\CoreBundle\Entity\SfWdgUsers $users
     * @return SfWdgOrganisationsMembers
     */
    public function setUsers(\WDG\CoreBundle\Entity\SfWdgUsers $users = null)
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

    /**
     * Set organisations
     *
     * @param \WDG\CoreBundle\Entity\SfWdgOrganisations $organisations
     * @return SfWdgOrganisationsMembers
     */
    public function setOrganisations(\WDG\CoreBundle\Entity\SfWdgOrganisations $organisations = null)
    {
        $this->organisations = $organisations;

        return $this;
    }

    /**
     * Get organisations
     *
     * @return \WDG\CoreBundle\Entity\SfWdgOrganisations 
     */
    public function getOrganisations()
    {
        return $this->organisations;
    }

    /**
     * Set roles
     *
     * @param \WDG\CoreBundle\Entity\SfWdgRoles $roles
     * @return SfWdgOrganisationsMembers
     */
    public function setRoles(\WDG\CoreBundle\Entity\SfWdgRoles $roles = null)
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
}
