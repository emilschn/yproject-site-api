<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\BoppProjectOrganisationManagement
 *
 * @ORM\Entity(repositoryClass="BoppProjectOrganisationManagementRepository")
 * @ORM\Table(name="bopp_project_organisation_management", indexes={@ORM\Index(name="fk_bopp_user_has_bopp_role_bopp_role1_idx", columns={"bopp_role_id"}), @ORM\Index(name="fk_bopp_user_has_bopp_role_bopp_organisation_idx", columns={"bopp_organisation_id"}), @ORM\Index(name="fk_bopp_user_has_bopp_role_bopp_project1_idx", columns={"bopp_project_id"})})
 */
class BoppProjectOrganisationManagement
{


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="BoppOrganisation", inversedBy="boppProjectOrganisationManagements")
     * @ORM\JoinColumn(name="bopp_organisation_id", referencedColumnName="id")
     */
    private $boppOrganisation;

    /**
     * @ORM\ManyToOne(targetEntity="BoppRole", inversedBy="boppProjectOrganisationManagements")
     * @ORM\JoinColumn(name="bopp_role_id", referencedColumnName="id")
     */
    private $boppRole;

    /**
     * @ORM\ManyToOne(targetEntity="BoppProject", inversedBy="boppProjectOrganisationManagements")
     * @ORM\JoinColumn(name="bopp_project_id", referencedColumnName="id")
     */
    private $boppProject;

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
     * Set BoppUser entity (many to one).
     *
     * @param \Entity\BoppOrganisation $boppOrganisation
     * @return \Entity\BoppProjectManagement
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
     * @return \Entity\BoppProjectOrganisationManagement
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
     * Set BoppProject entity (many to one).
     *
     * @param \Entity\BoppProject $boppProject
     * @return \Entity\BoppProjectOrganisationManagement
     */
    public function setBoppProject(BoppProject $boppProject = null)
    {
        $this->boppProject = $boppProject;

        return $this;
    }

    /**
     * Get BoppProject entity (many to one).
     *
     * @return \Entity\BoppProject
     */
    public function getBoppProject()
    {
        return $this->boppProject;
    }

    public function __sleep()
    {
        return array('bopp_organisation_id', 'bopp_role_id', 'bopp_project_id');
    }
}
