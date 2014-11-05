<?php
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
     * @ORM\ManyToOne(targetEntity="SfWdgOrganisations", inversedBy="sfWdgOrganisationsMembers")
     * @ORM\JoinColumn(name="SfWdgOrganisationsId", referencedColumnName="id")
     */
    private $sfWdgOrganisations;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgRoles", inversedBy="organisationsMembers")
     * @ORM\JoinColumn(name="SfWdgRolesId", referencedColumnName="id")
     */
    private $roles;
}