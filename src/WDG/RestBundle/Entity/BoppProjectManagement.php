<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\BoppProjectManagement
 *
 * @ORM\Entity(repositoryClass="BoppProjectManagementRepository")
 * @ORM\Table(name="bopp_project_management", indexes={@ORM\Index(name="fk_bopp_user_has_bopp_role_bopp_role1_idx", columns={"bopp_role_id"}), @ORM\Index(name="fk_bopp_user_has_bopp_role_bopp_user_idx", columns={"bopp_user_id"}), @ORM\Index(name="fk_bopp_user_has_bopp_role_bopp_project1_idx", columns={"bopp_project_id"})})
 */
class BoppProjectManagement
{


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="BoppUser", inversedBy="boppProjectManagements")
     * @ORM\JoinColumn(name="bopp_user_id", referencedColumnName="id")
     */
    private $boppUser;

    /**
     * @ORM\ManyToOne(targetEntity="BoppRole", inversedBy="boppProjectManagements")
     * @ORM\JoinColumn(name="bopp_role_id", referencedColumnName="id")
     */
    private $boppRole;

    /**
     * @ORM\ManyToOne(targetEntity="BoppProject", inversedBy="boppProjectManagements")
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
     * @param \Entity\BoppUser $boppUser
     * @return \Entity\BoppProjectManagement
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

    /**
     * Set BoppRole entity (many to one).
     *
     * @param \Entity\BoppRole $boppRole
     * @return \Entity\BoppProjectManagement
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
     * @return \Entity\BoppProjectManagement
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
        return array('bopp_user_id', 'bopp_role_id', 'bopp_project_id');
    }
}
