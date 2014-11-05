<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgOrganisations
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
    private $orgaName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $orgaCreationDate;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $orgaImmatriculation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $orgaHeadOffice;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $orgaAPEcode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $orgaStrutureObject;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $orgaLegalRepresentative;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $orgaLegalRepresentativeCapacity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $orgaKbisUrl;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $orgaIdDocLegalRepresentative;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $orgaWebsiteUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $orgaSocieteUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $orgaTwitterUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $orgaFacebookUrl;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgProjects", mappedBy="organisations")
     */
    private $projects;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgOrganisationsMembers", mappedBy="sfWdgOrganisations")
     */
    private $sfWdgOrganisationsMembers;
}