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
     * @ORM\Column(type="integer")
     */
    protected $organisation_wpref;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $organisation_name;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $organisation_creation_date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $organisation_strong_authentication;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_type;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_legalform;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_idnumber;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_rcs;

    /**
     * @ORM\Column(type="integer")
     */
    protected $organisation_capital;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $organisation_address;

    /**
     * @ORM\Column(type="integer")
     */
    protected $organisation_postalcode;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_city;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_country;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $organisation_ape;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_bank_owner;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $organisation_bank_address;

    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $organisation_bank_iban;

    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $organisation_bank_bic;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $organisation_website_url;

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
     * Set the value of organisation_wpref.
     *
     * @param integer $organisation_wpref
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationWpref($organisation_wpref)
    {
        $this->organisation_wpref = $organisation_wpref;

        return $this;
    }

    /**
     * Get the value of organisation_wpref.
     *
     * @return integer
     */
    public function getOrganisationWpref()
    {
        return $this->organisation_wpref;
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
     * Set the value of organisation_strong_authentication.
     *
     * @param datetime $organisation_strong_authentication
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationStrongAuthentication($organisation_strong_authentication)
    {
        $this->organisation_strong_authentication = $organisation_strong_authentication;

        return $this;
    }

    /**
     * Get the value of organisation_strong_authentication.
     *
     * @return datetime
     */
    public function getOrganisationStrongAuthentication()
    {
        return $this->organisation_strong_authentication;
    }

    /**
     * Set the value of organisation_type.
     *
     * @param string $organisation_type
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationType($organisation_type)
    {
        $this->organisation_type = $organisation_type;

        return $this;
    }

    /**
     * Get the value of organisation_type.
     *
     * @return string
     */
    public function getOrganisationType()
    {
        return $this->organisation_type;
    }

    /**
     * Set the value of organisation_legalform.
     *
     * @param string $organisation_legalform
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationLegalform($organisation_legalform)
    {
        $this->organisation_legalform = $organisation_legalform;

        return $this;
    }

    /**
     * Get the value of organisation_legalform.
     *
     * @return string
     */
    public function getOrganisationLegalform()
    {
        return $this->organisation_legalform;
    }

    /**
     * Set the value of organisation_idnumber.
     *
     * @param string $organisation_idnumber
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationIdnumber($organisation_idnumber)
    {
        $this->organisation_idnumber = $organisation_idnumber;

        return $this;
    }

    /**
     * Get the value of organisation_idnumber.
     *
     * @return string
     */
    public function getOrganisationIdnumber()
    {
        return $this->organisation_idnumber;
    }

    /**
     * Set the value of organisation_rcs.
     *
     * @param string $organisation_rcs
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationRcs($organisation_rcs)
    {
        $this->organisation_rcs = $organisation_rcs;

        return $this;
    }

    /**
     * Get the value of organisation_rcs.
     *
     * @return string
     */
    public function getOrganisationRcs()
    {
        return $this->organisation_rcs;
    }

    /**
     * Set the value of organisation_capital.
     *
     * @param string $organisation_capital
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationCapital($organisation_capital)
    {
        $this->organisation_capital = $organisation_capital;

        return $this;
    }

    /**
     * Get the value of organisation_capital.
     *
     * @return string
     */
    public function getOrganisationCapital()
    {
        return $this->organisation_capital;
    }

    /**
     * Set the value of organisation_address.
     *
     * @param string $organisation_address
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationAddress($organisation_address)
    {
        $this->organisation_address = $organisation_address;

        return $this;
    }

    /**
     * Get the value of organisation_address.
     *
     * @return string
     */
    public function getOrganisationAddress()
    {
        return $this->organisation_address;
    }

    /**
     * Set the value of organisation_postalcode.
     *
     * @param string $organisation_postalcode
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationPostalcode($organisation_postalcode)
    {
        $this->organisation_postalcode = $organisation_postalcode;

        return $this;
    }

    /**
     * Get the value of organisation_postalcode.
     *
     * @return string
     */
    public function getOrganisationPostalcode()
    {
        return $this->organisation_postalcode;
    }

    /**
     * Set the value of organisation_city.
     *
     * @param string $organisation_city
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationCity($organisation_city)
    {
        $this->organisation_city = $organisation_city;

        return $this;
    }

    /**
     * Get the value of organisation_city.
     *
     * @return string
     */
    public function getOrganisationCity()
    {
        return $this->organisation_city;
    }

    /**
     * Set the value of organisation_country.
     *
     * @param string $organisation_country
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationCountry($organisation_country)
    {
        $this->organisation_country = $organisation_country;

        return $this;
    }

    /**
     * Get the value of organisation_country.
     *
     * @return string
     */
    public function getOrganisationCountry()
    {
        return $this->organisation_country;
    }

    /**
     * Set the value of organisation_ape.
     *
     * @param string $organisation_ape
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationApe($organisation_ape)
    {
        $this->organisation_ape = $organisation_ape;

        return $this;
    }

    /**
     * Get the value of organisation_ape.
     *
     * @return string
     */
    public function getOrganisationApe()
    {
        return $this->organisation_ape;
    }

    /**
     * Set the value of organisation_bank_owner.
     *
     * @param string $organisation_bank_owner
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationBankOwner($organisation_bank_owner)
    {
        $this->organisation_bank_owner = $organisation_bank_owner;

        return $this;
    }

    /**
     * Get the value of organisation_bank_owner.
     *
     * @return string
     */
    public function getOrganisationBankOwner()
    {
        return $this->organisation_bank_owner;
    }

    /**
     * Set the value of organisation_bank_address.
     *
     * @param string $organisation_bank_address
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationBankAddress($organisation_bank_address)
    {
        $this->organisation_bank_address = $organisation_bank_address;

        return $this;
    }

    /**
     * Get the value of organisation_bank_address.
     *
     * @return string
     */
    public function getOrganisationBankAddress()
    {
        return $this->organisation_bank_address;
    }

    /**
     * Set the value of organisation_bank_iban.
     *
     * @param string $organisation_bank_iban
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationBankIban($organisation_bank_iban)
    {
        $this->organisation_bank_iban = $organisation_bank_iban;

        return $this;
    }

    /**
     * Get the value of organisation_bank_iban.
     *
     * @return string
     */
    public function getOrganisationBankIban()
    {
        return $this->organisation_bank_iban;
    }

    /**
     * Set the value of organisation_bank_bic.
     *
     * @param string $organisation_bank_bic
     * @return \Entity\BoppOrganisation
     */
    public function setOrganisationBankBic($organisation_bank_bic)
    {
        $this->organisation_bank_bic = $organisation_bank_bic;

        return $this;
    }

    /**
     * Get the value of organisation_bank_bic.
     *
     * @return string
     */
    public function getOrganisationBankBic()
    {
        return $this->organisation_bank_bic;
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
        return array('id', 'organisation_name', 'organisation_creation_date', 'organisation_website_url', 'organisation_twitter_url', 'organisation_facebook_url', 'organisation_linkedin_url', 'organisation_viadeo_url');
    }
}
