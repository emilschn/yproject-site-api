<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\BoppOrganisation
 *
 * @ORM\Entity(repositoryClass="BoppOrganisationRepository")
 * @ORM\Table(name="bopp_organisation")
 */
class BoppOrganisation
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
    protected $organisation_name;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $organisation_creation_date;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $organisation_immatriculation;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_head_office;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $organisation_APE_code;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_struture_object;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_legal_representative;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_legal_representative_capacity;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_kbis_url;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_id_doc_legal_representative;

    /**
     * @ORM\Column(type="text")
     */
    protected $organisation_website_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $organisation_societe_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $organisation_twitter_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $organisation_facebook_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $organisation_linkedin_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $organisation_viadeo_url;

    /**
     * @ORM\OneToMany(targetEntity="BoppOrganisationManagement", mappedBy="boppOrganisation")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_organisation_id")
     */
    protected $boppOrganisationManagements;

    public function __construct()
    {
        $this->boppOrganisationManagements = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\BoppOrganisation
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
     * Set the value of organisation_name.
     *
     * @param string $organisation_name
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationName($organisation_name)
    {
        $this->organisation_name = $organisation_name;

        return $this;
    }

    /**
     * Get the value of organisation_name.
     *
     * @return string
     */
    public function getOrganisationName()
    {
        return $this->organisation_name;
    }

    /**
     * Set the value of organisation_creation_date.
     *
     * @param datetime $organisation_creation_date
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationCreationDate($organisation_creation_date)
    {
        $this->organisation_creation_date = $organisation_creation_date;

        return $this;
    }

    /**
     * Get the value of organisation_creation_date.
     *
     * @return datetime
     */
    public function getOrganisationCreationDate()
    {
        return $this->organisation_creation_date;
    }

    /**
     * Set the value of organisation_immatriculation.
     *
     * @param string $organisation_immatriculation
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationImmatriculation($organisation_immatriculation)
    {
        $this->organisation_immatriculation = $organisation_immatriculation;

        return $this;
    }

    /**
     * Get the value of organisation_immatriculation.
     *
     * @return string
     */
    public function getOrganisationImmatriculation()
    {
        return $this->organisation_immatriculation;
    }

    /**
     * Set the value of organisation_head_office.
     *
     * @param string $organisation_head_office
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationHeadOffice($organisation_head_office)
    {
        $this->organisation_head_office = $organisation_head_office;

        return $this;
    }

    /**
     * Get the value of organisation_head_office.
     *
     * @return string
     */
    public function getOrganisationHeadOffice()
    {
        return $this->organisation_head_office;
    }

    /**
     * Set the value of organisation_APE_code.
     *
     * @param string $organisation_APE_code
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationAPECode($organisation_APE_code)
    {
        $this->organisation_APE_code = $organisation_APE_code;

        return $this;
    }

    /**
     * Get the value of organisation_APE_code.
     *
     * @return string
     */
    public function getOrganisationAPECode()
    {
        return $this->organisation_APE_code;
    }

    /**
     * Set the value of organisation_struture_object.
     *
     * @param string $organisation_struture_object
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationStrutureObject($organisation_struture_object)
    {
        $this->organisation_struture_object = $organisation_struture_object;

        return $this;
    }

    /**
     * Get the value of organisation_struture_object.
     *
     * @return string
     */
    public function getOrganisationStrutureObject()
    {
        return $this->organisation_struture_object;
    }

    /**
     * Set the value of organisation_legal_representative.
     *
     * @param string $organisation_legal_representative
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationLegalRepresentative($organisation_legal_representative)
    {
        $this->organisation_legal_representative = $organisation_legal_representative;

        return $this;
    }

    /**
     * Get the value of organisation_legal_representative.
     *
     * @return string
     */
    public function getOrganisationLegalRepresentative()
    {
        return $this->organisation_legal_representative;
    }

    /**
     * Set the value of organisation_legal_representative_capacity.
     *
     * @param string $organisation_legal_representative_capacity
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationLegalRepresentativeCapacity($organisation_legal_representative_capacity)
    {
        $this->organisation_legal_representative_capacity = $organisation_legal_representative_capacity;

        return $this;
    }

    /**
     * Get the value of organisation_legal_representative_capacity.
     *
     * @return string
     */
    public function getOrganisationLegalRepresentativeCapacity()
    {
        return $this->organisation_legal_representative_capacity;
    }

    /**
     * Set the value of organisation_kbis_url.
     *
     * @param string $organisation_kbis_url
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationKbisUrl($organisation_kbis_url)
    {
        $this->organisation_kbis_url = $organisation_kbis_url;

        return $this;
    }

    /**
     * Get the value of organisation_kbis_url.
     *
     * @return string
     */
    public function getOrganisationKbisUrl()
    {
        return $this->organisation_kbis_url;
    }

    /**
     * Set the value of organisation_id_doc_legal_representative.
     *
     * @param string $organisation_id_doc_legal_representative
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationIdDocLegalRepresentative($organisation_id_doc_legal_representative)
    {
        $this->organisation_id_doc_legal_representative = $organisation_id_doc_legal_representative;

        return $this;
    }

    /**
     * Get the value of organisation_id_doc_legal_representative.
     *
     * @return string
     */
    public function getOrganisationIdDocLegalRepresentative()
    {
        return $this->organisation_id_doc_legal_representative;
    }

    /**
     * Set the value of organisation_website_url.
     *
     * @param string $organisation_website_url
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationWebsiteUrl($organisation_website_url)
    {
        $this->organisation_website_url = $organisation_website_url;

        return $this;
    }

    /**
     * Get the value of organisation_website_url.
     *
     * @return string
     */
    public function getOrganisationWebsiteUrl()
    {
        return $this->organisation_website_url;
    }

    /**
     * Set the value of organisation_societe_url.
     *
     * @param string $organisation_societe_url
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationSocieteUrl($organisation_societe_url)
    {
        $this->organisation_societe_url = $organisation_societe_url;

        return $this;
    }

    /**
     * Get the value of organisation_societe_url.
     *
     * @return string
     */
    public function getOrganisationSocieteUrl()
    {
        return $this->organisation_societe_url;
    }

    /**
     * Set the value of organisation_twitter_url.
     *
     * @param string $organisation_twitter_url
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationTwitterUrl($organisation_twitter_url)
    {
        $this->organisation_twitter_url = $organisation_twitter_url;

        return $this;
    }

    /**
     * Get the value of organisation_twitter_url.
     *
     * @return string
     */
    public function getOrganisationTwitterUrl()
    {
        return $this->organisation_twitter_url;
    }

    /**
     * Set the value of organisation_facebook_url.
     *
     * @param string $organisation_facebook_url
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationFacebookUrl($organisation_facebook_url)
    {
        $this->organisation_facebook_url = $organisation_facebook_url;

        return $this;
    }

    /**
     * Get the value of organisation_facebook_url.
     *
     * @return string
     */
    public function getOrganisationFacebookUrl()
    {
        return $this->organisation_facebook_url;
    }

    /**
     * Set the value of organisation_linkedin_url.
     *
     * @param string $organisation_linkedin_url
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationLinkedinUrl($organisation_linkedin_url)
    {
        $this->organisation_linkedin_url = $organisation_linkedin_url;

        return $this;
    }

    /**
     * Get the value of organisation_linkedin_url.
     *
     * @return string
     */
    public function getOrganisationLinkedinUrl()
    {
        return $this->organisation_linkedin_url;
    }

    /**
     * Set the value of organisation_viadeo_url.
     *
     * @param string $organisation_viadeo_url
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationViadeoUrl($organisation_viadeo_url)
    {
        $this->organisation_viadeo_url = $organisation_viadeo_url;

        return $this;
    }

    /**
     * Get the value of organisation_viadeo_url.
     *
     * @return string
     */
    public function getOrganisationViadeoUrl()
    {
        return $this->organisation_viadeo_url;
    }

    /**
     * Add BoppOrganisationManagement entity to collection (one to many).
     *
     * @param \Entity\BoppOrganisationManagement $boppOrganisationManagement
     * @return \Entity\BoppOrganisation
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
     * @return \Entity\BoppOrganisation
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

    public function __sleep()
    {
        return array('id', 'organisation_name', 'organisation_creation_date', 'organisation_immatriculation', 'organisation_head_office', 'organisation_APE_code', 'organisation_struture_object', 'organisation_legal_representative', 'organisation_legal_representative_capacity', 'organisation_kbis_url', 'organisation_id_doc_legal_representative', 'organisation_website_url', 'organisation_societe_url', 'organisation_twitter_url', 'organisation_facebook_url', 'organisation_linkedin_url', 'organisation_viadeo_url');
    }
}
