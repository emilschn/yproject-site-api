<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\BoppRole
 *
 * @ORM\Entity(repositoryClass="BoppRoleRepository")
 * @ORM\Table(name="bopp_role")
 */
class BoppRole
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $role_name;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $role_slug;

    /**
     * @ORM\OneToMany(targetEntity="BoppOrganisationManagement", mappedBy="boppRole")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_role_id")
     */
    protected $boppOrganisationManagements;

    /**
     * @ORM\OneToMany(targetEntity="BoppProjectManagement", mappedBy="boppRole")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_role_id")
     */
    protected $boppProjectManagements;

    public function __construct()
    {
        $this->boppOrganisationManagements = new ArrayCollection();
        $this->boppProjectManagements = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\BoppRole
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of role_name.
     *
     * @param string $role_name
     * @return \Entity\BoppRole
     */
    public function setRoleName($role_name)
    {
        $this->role_name = $role_name;

        return $this;
    }

    /**
     * Get the value of role_name.
     *
     * @return string
     */
    public function getRoleName()
    {
        return $this->role_name;
    }

    /**
     * Set the value of role_slug.
     *
     * @param string $role_slug
     * @return \Entity\BoppRole
     */
    public function setRoleSlug($role_slug)
    {
        $this->role_slug = $role_slug;

        return $this;
    }

    /**
     * Get the value of role_slug.
     *
     * @return string
     */
    public function getRoleSlug()
    {
        return $this->role_slug;
    }

    /**
     * Add BoppOrganisationManagement entity to collection (one to many).
     *
     * @param \Entity\BoppOrganisationManagement $boppOrganisationManagement
     * @return \Entity\BoppRole
     */
    public function addBoppOrganisationManagement(BoppOrganisationManagement $boppOrganisationManagement)
    {
        $this->boppOrganisationManagements[] = $boppOrganisationManagement;

        return $this;
    }

    /**
     * Remove BoppOrganisationManagement entity from collection (one to many).
     *
     * @param \Entity\BoppOrganisationManagement $boppOrganisationManagement
     * @return \Entity\BoppRole
     */
    public function removeBoppOrganisationManagement(BoppOrganisationManagement $boppOrganisationManagement)
    {
        $this->boppOrganisationManagements->removeElement($boppOrganisationManagement);

        return $this;
    }

    /**
     * Get BoppOrganisationManagement entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppOrganisationManagements()
    {
        return $this->boppOrganisationManagements;
    }

    /**
     * Add BoppProjectManagement entity to collection (one to many).
     *
     * @param \Entity\BoppProjectManagement $boppProjectManagement
     * @return \Entity\BoppRole
     */
    public function addBoppProjectManagement(BoppProjectManagement $boppProjectManagement)
    {
        $this->boppProjectManagements[] = $boppProjectManagement;

        return $this;
    }

    /**
     * Remove BoppProjectManagement entity from collection (one to many).
     *
     * @param \Entity\BoppProjectManagement $boppProjectManagement
     * @return \Entity\BoppRole
     */
    public function removeBoppProjectManagement(BoppProjectManagement $boppProjectManagement)
    {
        $this->boppProjectManagements->removeElement($boppProjectManagement);

        return $this;
    }

    /**
     * Get BoppProjectManagement entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppProjectManagements()
    {
        return $this->boppProjectManagements;
    }

    public function __sleep()
    {
        return array('id', 'role_name', 'role_slug');
    }
}
