<?php
namespace WDG\CoreBundle\Entity;
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set orgaName
     *
     * @param string $orgaName
     * @return SfWdgOrganisations
     */
    public function setOrgaName($orgaName)
    {
        $this->orgaName = $orgaName;

        return $this;
    }

    /**
     * Get orgaName
     *
     * @return string 
     */
    public function getOrgaName()
    {
        return $this->orgaName;
    }

    /**
     * Set orgaCreationDate
     *
     * @param \DateTime $orgaCreationDate
     * @return SfWdgOrganisations
     */
    public function setOrgaCreationDate($orgaCreationDate)
    {
        $this->orgaCreationDate = $orgaCreationDate;

        return $this;
    }

    /**
     * Get orgaCreationDate
     *
     * @return \DateTime 
     */
    public function getOrgaCreationDate()
    {
        return $this->orgaCreationDate;
    }

    /**
     * Set orgaImmatriculation
     *
     * @param string $orgaImmatriculation
     * @return SfWdgOrganisations
     */
    public function setOrgaImmatriculation($orgaImmatriculation)
    {
        $this->orgaImmatriculation = $orgaImmatriculation;

        return $this;
    }

    /**
     * Get orgaImmatriculation
     *
     * @return string 
     */
    public function getOrgaImmatriculation()
    {
        return $this->orgaImmatriculation;
    }

    /**
     * Set orgaHeadOffice
     *
     * @param string $orgaHeadOffice
     * @return SfWdgOrganisations
     */
    public function setOrgaHeadOffice($orgaHeadOffice)
    {
        $this->orgaHeadOffice = $orgaHeadOffice;

        return $this;
    }

    /**
     * Get orgaHeadOffice
     *
     * @return string 
     */
    public function getOrgaHeadOffice()
    {
        return $this->orgaHeadOffice;
    }

    /**
     * Set orgaAPEcode
     *
     * @param string $orgaAPEcode
     * @return SfWdgOrganisations
     */
    public function setOrgaAPEcode($orgaAPEcode)
    {
        $this->orgaAPEcode = $orgaAPEcode;

        return $this;
    }

    /**
     * Get orgaAPEcode
     *
     * @return string 
     */
    public function getOrgaAPEcode()
    {
        return $this->orgaAPEcode;
    }

    /**
     * Set orgaStrutureObject
     *
     * @param string $orgaStrutureObject
     * @return SfWdgOrganisations
     */
    public function setOrgaStrutureObject($orgaStrutureObject)
    {
        $this->orgaStrutureObject = $orgaStrutureObject;

        return $this;
    }

    /**
     * Get orgaStrutureObject
     *
     * @return string 
     */
    public function getOrgaStrutureObject()
    {
        return $this->orgaStrutureObject;
    }

    /**
     * Set orgaLegalRepresentative
     *
     * @param string $orgaLegalRepresentative
     * @return SfWdgOrganisations
     */
    public function setOrgaLegalRepresentative($orgaLegalRepresentative)
    {
        $this->orgaLegalRepresentative = $orgaLegalRepresentative;

        return $this;
    }

    /**
     * Get orgaLegalRepresentative
     *
     * @return string 
     */
    public function getOrgaLegalRepresentative()
    {
        return $this->orgaLegalRepresentative;
    }

    /**
     * Set orgaLegalRepresentativeCapacity
     *
     * @param string $orgaLegalRepresentativeCapacity
     * @return SfWdgOrganisations
     */
    public function setOrgaLegalRepresentativeCapacity($orgaLegalRepresentativeCapacity)
    {
        $this->orgaLegalRepresentativeCapacity = $orgaLegalRepresentativeCapacity;

        return $this;
    }

    /**
     * Get orgaLegalRepresentativeCapacity
     *
     * @return string 
     */
    public function getOrgaLegalRepresentativeCapacity()
    {
        return $this->orgaLegalRepresentativeCapacity;
    }

    /**
     * Set orgaKbisUrl
     *
     * @param string $orgaKbisUrl
     * @return SfWdgOrganisations
     */
    public function setOrgaKbisUrl($orgaKbisUrl)
    {
        $this->orgaKbisUrl = $orgaKbisUrl;

        return $this;
    }

    /**
     * Get orgaKbisUrl
     *
     * @return string 
     */
    public function getOrgaKbisUrl()
    {
        return $this->orgaKbisUrl;
    }

    /**
     * Set orgaIdDocLegalRepresentative
     *
     * @param integer $orgaIdDocLegalRepresentative
     * @return SfWdgOrganisations
     */
    public function setOrgaIdDocLegalRepresentative($orgaIdDocLegalRepresentative)
    {
        $this->orgaIdDocLegalRepresentative = $orgaIdDocLegalRepresentative;

        return $this;
    }

    /**
     * Get orgaIdDocLegalRepresentative
     *
     * @return integer 
     */
    public function getOrgaIdDocLegalRepresentative()
    {
        return $this->orgaIdDocLegalRepresentative;
    }

    /**
     * Set orgaWebsiteUrl
     *
     * @param string $orgaWebsiteUrl
     * @return SfWdgOrganisations
     */
    public function setOrgaWebsiteUrl($orgaWebsiteUrl)
    {
        $this->orgaWebsiteUrl = $orgaWebsiteUrl;

        return $this;
    }

    /**
     * Get orgaWebsiteUrl
     *
     * @return string 
     */
    public function getOrgaWebsiteUrl()
    {
        return $this->orgaWebsiteUrl;
    }

    /**
     * Set orgaSocieteUrl
     *
     * @param string $orgaSocieteUrl
     * @return SfWdgOrganisations
     */
    public function setOrgaSocieteUrl($orgaSocieteUrl)
    {
        $this->orgaSocieteUrl = $orgaSocieteUrl;

        return $this;
    }

    /**
     * Get orgaSocieteUrl
     *
     * @return string 
     */
    public function getOrgaSocieteUrl()
    {
        return $this->orgaSocieteUrl;
    }

    /**
     * Set orgaTwitterUrl
     *
     * @param string $orgaTwitterUrl
     * @return SfWdgOrganisations
     */
    public function setOrgaTwitterUrl($orgaTwitterUrl)
    {
        $this->orgaTwitterUrl = $orgaTwitterUrl;

        return $this;
    }

    /**
     * Get orgaTwitterUrl
     *
     * @return string 
     */
    public function getOrgaTwitterUrl()
    {
        return $this->orgaTwitterUrl;
    }

    /**
     * Set orgaFacebookUrl
     *
     * @param string $orgaFacebookUrl
     * @return SfWdgOrganisations
     */
    public function setOrgaFacebookUrl($orgaFacebookUrl)
    {
        $this->orgaFacebookUrl = $orgaFacebookUrl;

        return $this;
    }

    /**
     * Get orgaFacebookUrl
     *
     * @return string 
     */
    public function getOrgaFacebookUrl()
    {
        return $this->orgaFacebookUrl;
    }

    /**
     * Set projects
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjects $projects
     * @return SfWdgOrganisations
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
