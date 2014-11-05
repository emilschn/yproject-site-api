<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\BoppOrganisationManagement
 *
 * @ORM\Entity(repositoryClass="BoppOrganisationManagementRepository")
 * @ORM\Table(name="bopp_organisation_management", indexes={@ORM\Index(name="fk_bopp_organisation_has_bopp_role_bopp_role1_idx", columns={"bopp_role_id"}), @ORM\Index(name="fk_bopp_organisation_has_bopp_role_bopp_organisation1_idx", columns={"bopp_organisation_id"}), @ORM\Index(name="fk_bopp_organisation_has_bopp_role_bopp_user1_idx", columns={"bopp_user_id"})})
 */
class BoppOrganisationManagement
{


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="BoppOrganisation", inversedBy="boppOrganisationManagements")
     * @ORM\JoinColumn(name="bopp_organisation_id", referencedColumnName="id")
     */
    protected $boppOrganisation;

    /**
     * @ORM\ManyToOne(targetEntity="BoppRole", inversedBy="boppOrganisationManagements")
     * @ORM\JoinColumn(name="bopp_role_id", referencedColumnName="id")
     */
    protected $boppRole;

    /**
     * @ORM\ManyToOne(targetEntity="BoppUser", inversedBy="boppOrganisationManagements")
     * @ORM\JoinColumn(name="bopp_user_id", referencedColumnName="id")
     */
    protected $boppUser;

    public function __construct()
    {
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
     * Set BoppOrganisation entity (many to one).
     *
     * @param \Entity\BoppOrganisation $boppOrganisation
     * @return \Entity\BoppOrganisationManagement
     */
    public function setBoppOrganisation(BoppOrganisation $boppOrganisation = null)
    {
        $this->boppOrganisation = $boppOrganisation;

        return $this;
    }

    /**
     * Get BoppOrganisation entity (many to one).
     *
     * @return \Entity\BoppOrganisation
     */
    public function getBoppOrganisation()
    {
        return $this->boppOrganisation;
    }

    /**
     * Set BoppRole entity (many to one).
     *
     * @param \Entity\BoppRole $boppRole
     * @return \Entity\BoppOrganisationManagement
     */
    public function setBoppRole(BoppRole $boppRole = null)
    {
        $this->boppRole = $boppRole;

        return $this;
    }

    /**
     * Get BoppRole entity (many to one).
     *
     * @return \Entity\BoppRole
     */
    public function getBoppRole()
    {
        return $this->boppRole;
    }

    /**
     * Set BoppUser entity (many to one).
     *
     * @param \Entity\BoppUser $boppUser
     * @return \Entity\BoppOrganisationManagement
     */
    public function setBoppUser(BoppUser $boppUser = null)
    {
        $this->boppUser = $boppUser;

        return $this;
    }

    /**
     * Get BoppUser entity (many to one).
     *
     * @return \Entity\BoppUser
     */
    public function getBoppUser()
    {
        return $this->boppUser;
    }

    public function __sleep()
    {
        return array('bopp_organisation_id', 'bopp_role_id', 'bopp_user_id');
    }
}