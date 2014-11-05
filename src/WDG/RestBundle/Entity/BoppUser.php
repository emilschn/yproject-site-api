<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\BoppUser
 *
 * @ORM\Entity(repositoryClass="BoppUserRepository")
 * @ORM\Table(name="bopp_user")
 */
class BoppUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $user_wp_id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $user_gender;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $user_name;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $user_surname;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $user_username;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $user_birthday_date;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $user_birthday_city;

    /**
     * @ORM\Column(type="text")
     */
    protected $user_address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $user_postal_code;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $user_city;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $user_email;

    /**
     * @ORM\Column(type="text")
     */
    protected $user_linkedin_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $user_twitter_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $user_facebook_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $user_viadeo_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $user_picture_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $user_website_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $user_activation_key;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $user_password;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $user_signup_date;

    /**
     * @ORM\OneToOne(targetEntity="BoppComment", mappedBy="boppUser")
     */
    protected $boppComment;

    /**
     * @ORM\OneToOne(targetEntity="BoppDiscussion", mappedBy="boppUser")
     */
    protected $boppDiscussion;

    /**
     * @ORM\OneToOne(targetEntity="BoppEvent", mappedBy="boppUser")
     */
    protected $boppEvent;

    /**
     * @ORM\OneToMany(targetEntity="BoppEventStatusGuest", mappedBy="boppUser")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_user_id")
     */
    protected $boppEventStatusGuests;

    /**
     * @ORM\OneToMany(targetEntity="BoppFollow", mappedBy="boppUser")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_user_id")
     */
    protected $boppFollows;

    /**
     * @ORM\OneToOne(targetEntity="BoppNews", mappedBy="boppUser")
     */
    protected $boppNews;

    /**
     * @ORM\OneToMany(targetEntity="BoppNewsfeed", mappedBy="boppUser")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_user_id")
     */
    protected $boppNewsfeeds;

    /**
     * @ORM\OneToMany(targetEntity="BoppOrganisationManagement", mappedBy="boppUser")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_user_id")
     */
    protected $boppOrganisationManagements;

    /**
     * @ORM\OneToMany(targetEntity="BoppProjectManagement", mappedBy="boppUser")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_user_id")
     */
    protected $boppProjectManagements;

    /**
     * @ORM\OneToOne(targetEntity="BoppTask", mappedBy="boppUser")
     */
    protected $boppTask;

    /**
     * @ORM\OneToMany(targetEntity="BoppTaskUserAssigned", mappedBy="boppUser")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_user_id")
     */
    protected $boppTaskUserAssigneds;

    public function __construct()
    {
        $this->boppComments = new ArrayCollection();
        $this->boppDiscussions = new ArrayCollection();
        $this->boppEvents = new ArrayCollection();
        $this->boppEventStatusGuests = new ArrayCollection();
        $this->boppFollows = new ArrayCollection();
        $this->boppNews = new ArrayCollection();
        $this->boppNewsfeeds = new ArrayCollection();
        $this->boppOrganisationManagements = new ArrayCollection();
        $this->boppProjectManagements = new ArrayCollection();
        $this->boppTasks = new ArrayCollection();
        $this->boppTaskUserAssigneds = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\BoppUser
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
     * Set the value of user_wp_id.
     *
     * @param string $user_wp_id
     * @return \Entity\BoppUser
     */
    public function setUserWpId($user_wp_id)
    {
        $this->user_wp_id = $user_wp_id;

        return $this;
    }

    /**
     * Get the value of user_wp_id.
     *
     * @return string
     */
    public function getUserWpId()
    {
        return $this->user_wp_id;
    }

    /**
     * Set the value of user_gender.
     *
     * @param string $user_gender
     * @return \Entity\BoppUser
     */
    public function setUserGender($user_gender)
    {
        $this->user_gender = $user_gender;

        return $this;
    }

    /**
     * Get the value of user_gender.
     *
     * @return string
     */
    public function getUserGender()
    {
        return $this->user_gender;
    }

    /**
     * Set the value of user_name.
     *
     * @param string $user_name
     * @return \Entity\BoppUser
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;

        return $this;
    }

    /**
     * Get the value of user_name.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * Set the value of user_surname.
     *
     * @param string $user_surname
     * @return \Entity\BoppUser
     */
    public function setUserSurname($user_surname)
    {
        $this->user_surname = $user_surname;

        return $this;
    }

    /**
     * Get the value of user_surname.
     *
     * @return string
     */
    public function getUserSurname()
    {
        return $this->user_surname;
    }

    /**
     * Set the value of user_username.
     *
     * @param string $user_username
     * @return \Entity\BoppUser
     */
    public function setUserUsername($user_username)
    {
        $this->user_username = $user_username;

        return $this;
    }

    /**
     * Get the value of user_username.
     *
     * @return string
     */
    public function getUserUsername()
    {
        return $this->user_username;
    }

    /**
     * Set the value of user_birthday_date.
     *
     * @param datetime $user_birthday_date
     * @return \Entity\BoppUser
     */
    public function setUserBirthdayDate($user_birthday_date)
    {
        $this->user_birthday_date = $user_birthday_date;

        return $this;
    }

    /**
     * Get the value of user_birthday_date.
     *
     * @return datetime
     */
    public function getUserBirthdayDate()
    {
        return $this->user_birthday_date;
    }

    /**
     * Set the value of user_birthday_city.
     *
     * @param string $user_birthday_city
     * @return \Entity\BoppUser
     */
    public function setUserBirthdayCity($user_birthday_city)
    {
        $this->user_birthday_city = $user_birthday_city;

        return $this;
    }

    /**
     * Get the value of user_birthday_city.
     *
     * @return string
     */
    public function getUserBirthdayCity()
    {
        return $this->user_birthday_city;
    }

    /**
     * Set the value of user_address.
     *
     * @param string $user_address
     * @return \Entity\BoppUser
     */
    public function setUserAddress($user_address)
    {
        $this->user_address = $user_address;

        return $this;
    }

    /**
     * Get the value of user_address.
     *
     * @return string
     */
    public function getUserAddress()
    {
        return $this->user_address;
    }

    /**
     * Set the value of user_postal_code.
     *
     * @param integer $user_postal_code
     * @return \Entity\BoppUser
     */
    public function setUserPostalCode($user_postal_code)
    {
        $this->user_postal_code = $user_postal_code;

        return $this;
    }

    /**
     * Get the value of user_postal_code.
     *
     * @return integer
     */
    public function getUserPostalCode()
    {
        return $this->user_postal_code;
    }

    /**
     * Set the value of user_city.
     *
     * @param string $user_city
     * @return \Entity\BoppUser
     */
    public function setUserCity($user_city)
    {
        $this->user_city = $user_city;

        return $this;
    }

    /**
     * Get the value of user_city.
     *
     * @return string
     */
    public function getUserCity()
    {
        return $this->user_city;
    }

    /**
     * Set the value of user_email.
     *
     * @param string $user_email
     * @return \Entity\BoppUser
     */
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;

        return $this;
    }

    /**
     * Get the value of user_email.
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * Set the value of user_linkedin_url.
     *
     * @param string $user_linkedin_url
     * @return \Entity\BoppUser
     */
    public function setUserLinkedinUrl($user_linkedin_url)
    {
        $this->user_linkedin_url = $user_linkedin_url;

        return $this;
    }

    /**
     * Get the value of user_linkedin_url.
     *
     * @return string
     */
    public function getUserLinkedinUrl()
    {
        return $this->user_linkedin_url;
    }

    /**
     * Set the value of user_twitter_url.
     *
     * @param string $user_twitter_url
     * @return \Entity\BoppUser
     */
    public function setUserTwitterUrl($user_twitter_url)
    {
        $this->user_twitter_url = $user_twitter_url;

        return $this;
    }

    /**
     * Get the value of user_twitter_url.
     *
     * @return string
     */
    public function getUserTwitterUrl()
    {
        return $this->user_twitter_url;
    }

    /**
     * Set the value of user_facebook_url.
     *
     * @param string $user_facebook_url
     * @return \Entity\BoppUser
     */
    public function setUserFacebookUrl($user_facebook_url)
    {
        $this->user_facebook_url = $user_facebook_url;

        return $this;
    }

    /**
     * Get the value of user_facebook_url.
     *
     * @return string
     */
    public function getUserFacebookUrl()
    {
        return $this->user_facebook_url;
    }

    /**
     * Set the value of user_viadeo_url.
     *
     * @param string $user_viadeo_url
     * @return \Entity\BoppUser
     */
    public function setUserViadeoUrl($user_viadeo_url)
    {
        $this->user_viadeo_url = $user_viadeo_url;

        return $this;
    }

    /**
     * Get the value of user_viadeo_url.
     *
     * @return string
     */
    public function getUserViadeoUrl()
    {
        return $this->user_viadeo_url;
    }

    /**
     * Set the value of user_picture_url.
     *
     * @param string $user_picture_url
     * @return \Entity\BoppUser
     */
    public function setUserPictureUrl($user_picture_url)
    {
        $this->user_picture_url = $user_picture_url;

        return $this;
    }

    /**
     * Get the value of user_picture_url.
     *
     * @return string
     */
    public function getUserPictureUrl()
    {
        return $this->user_picture_url;
    }

    /**
     * Set the value of user_website_url.
     *
     * @param string $user_website_url
     * @return \Entity\BoppUser
     */
    public function setUserWebsiteUrl($user_website_url)
    {
        $this->user_website_url = $user_website_url;

        return $this;
    }

    /**
     * Get the value of user_website_url.
     *
     * @return string
     */
    public function getUserWebsiteUrl()
    {
        return $this->user_website_url;
    }

    /**
     * Set the value of user_activation_key.
     *
     * @param string $user_activation_key
     * @return \Entity\BoppUser
     */
    public function setUserActivationKey($user_activation_key)
    {
        $this->user_activation_key = $user_activation_key;

        return $this;
    }

    /**
     * Get the value of user_activation_key.
     *
     * @return string
     */
    public function getUserActivationKey()
    {
        return $this->user_activation_key;
    }

    /**
     * Set the value of user_password.
     *
     * @param string $user_password
     * @return \Entity\BoppUser
     */
    public function setUserPassword($user_password)
    {
        $this->user_password = $user_password;

        return $this;
    }

    /**
     * Get the value of user_password.
     *
     * @return string
     */
    public function getUserPassword()
    {
        return $this->user_password;
    }

    /**
     * Set the value of user_signup_date.
     *
     * @param datetime $user_signup_date
     * @return \Entity\BoppUser
     */
    public function setUserSignupDate($user_signup_date)
    {
        $this->user_signup_date = $user_signup_date;

        return $this;
    }

    /**
     * Get the value of user_signup_date.
     *
     * @return datetime
     */
    public function getUserSignupDate()
    {
        return $this->user_signup_date;
    }

    /**
     * Set BoppUser entity (one to one).
     *
     * @param \Entity\BoppUser $boppUser
     * @return \Entity\BoppUser
     */
    public function setBoppUser(BoppUser $boppUser = null)
    {
        $boppUser->setBoppComment($this);
        $this->boppUser = $boppUser;

        return $this;
    }

    /**
     * Get BoppUser entity (one to one).
     *
     * @return \Entity\BoppUser
     */
    public function getBoppUser()
    {
        return $this->boppUser;
    }

    /**
     * Add BoppEventStatusGuest entity to collection (one to many).
     *
     * @param \Entity\BoppEventStatusGuest $boppEventStatusGuest
     * @return \Entity\BoppUser
     */
    public function addBoppEventStatusGuest(BoppEventStatusGuest $boppEventStatusGuest)
    {
        $this->boppEventStatusGuests[] = $boppEventStatusGuest;

        return $this;
    }

    /**
     * Remove BoppEventStatusGuest entity from collection (one to many).
     *
     * @param \Entity\BoppEventStatusGuest $boppEventStatusGuest
     * @return \Entity\BoppUser
     */
    public function removeBoppEventStatusGuest(BoppEventStatusGuest $boppEventStatusGuest)
    {
        $this->boppEventStatusGuests->removeElement($boppEventStatusGuest);

        return $this;
    }

    /**
     * Get BoppEventStatusGuest entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppEventStatusGuests()
    {
        return $this->boppEventStatusGuests;
    }

    /**
     * Add BoppFollow entity to collection (one to many).
     *
     * @param \Entity\BoppFollow $boppFollow
     * @return \Entity\BoppUser
     */
    public function addBoppFollow(BoppFollow $boppFollow)
    {
        $this->boppFollows[] = $boppFollow;

        return $this;
    }

    /**
     * Remove BoppFollow entity from collection (one to many).
     *
     * @param \Entity\BoppFollow $boppFollow
     * @return \Entity\BoppUser
     */
    public function removeBoppFollow(BoppFollow $boppFollow)
    {
        $this->boppFollows->removeElement($boppFollow);

        return $this;
    }

    /**
     * Get BoppFollow entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppFollows()
    {
        return $this->boppFollows;
    }


    /**
     * Add BoppNewsfeed entity to collection (one to many).
     *
     * @param \Entity\BoppNewsfeed $boppNewsfeed
     * @return \Entity\BoppUser
     */
    public function addBoppNewsfeed(BoppNewsfeed $boppNewsfeed)
    {
        $this->boppNewsfeeds[] = $boppNewsfeed;

        return $this;
    }

    /**
     * Remove BoppNewsfeed entity from collection (one to many).
     *
     * @param \Entity\BoppNewsfeed $boppNewsfeed
     * @return \Entity\BoppUser
     */
    public function removeBoppNewsfeed(BoppNewsfeed $boppNewsfeed)
    {
        $this->boppNewsfeeds->removeElement($boppNewsfeed);

        return $this;
    }

    /**
     * Get BoppNewsfeed entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppNewsfeeds()
    {
        return $this->boppNewsfeeds;
    }

    /**
     * Add BoppOrganisationManagement entity to collection (one to many).
     *
     * @param \Entity\BoppOrganisationManagement $boppOrganisationManagement
     * @return \Entity\BoppUser
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
     * @return \Entity\BoppUser
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
     * @return \Entity\BoppUser
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
     * @return \Entity\BoppUser
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


    /**
     * Add BoppTaskUserAssigned entity to collection (one to many).
     *
     * @param \Entity\BoppTaskUserAssigned $boppTaskUserAssigned
     * @return \Entity\BoppUser
     */
    public function addBoppTaskUserAssigned(BoppTaskUserAssigned $boppTaskUserAssigned)
    {
        $this->boppTaskUserAssigneds[] = $boppTaskUserAssigned;

        return $this;
    }

    /**
     * Remove BoppTaskUserAssigned entity from collection (one to many).
     *
     * @param \Entity\BoppTaskUserAssigned $boppTaskUserAssigned
     * @return \Entity\BoppUser
     */
    public function removeBoppTaskUserAssigned(BoppTaskUserAssigned $boppTaskUserAssigned)
    {
        $this->boppTaskUserAssigneds->removeElement($boppTaskUserAssigned);

        return $this;
    }

    /**
     * Get BoppTaskUserAssigned entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppTaskUserAssigneds()
    {
        return $this->boppTaskUserAssigneds;
    }

    public function __sleep()
    {
        return array('id', 'user_wp_id', 'user_gender', 'user_name', 'user_surname', 'user_username', 'user_birthday_date', 'user_birthday_city', 'user_address', 'user_postal_code', 'user_city', 'user_email', 'user_linkedin_url', 'user_twitter_url', 'user_facebook_url', 'user_viadeo_url', 'user_picture_url', 'user_website_url', 'user_activation_key', 'user_password', 'user_signup_date');
    }

    /**
     * Set boppComment
     *
     * @param \WDG\RestBundle\Entity\BoppComment $boppComment
     * @return BoppUser
     */
    public function setBoppComment(\WDG\RestBundle\Entity\BoppComment $boppComment = null)
    {
        $this->boppComment = $boppComment;

        return $this;
    }

    /**
     * Get boppComment
     *
     * @return \WDG\RestBundle\Entity\BoppComment 
     */
    public function getBoppComment()
    {
        return $this->boppComment;
    }

    /**
     * Set boppDiscussion
     *
     * @param \WDG\RestBundle\Entity\BoppDiscussion $boppDiscussion
     * @return BoppUser
     */
    public function setBoppDiscussion(\WDG\RestBundle\Entity\BoppDiscussion $boppDiscussion = null)
    {
        $this->boppDiscussion = $boppDiscussion;

        return $this;
    }

    /**
     * Get boppDiscussion
     *
     * @return \WDG\RestBundle\Entity\BoppDiscussion 
     */
    public function getBoppDiscussion()
    {
        return $this->boppDiscussion;
    }

    /**
     * Set boppEvent
     *
     * @param \WDG\RestBundle\Entity\BoppEvent $boppEvent
     * @return BoppUser
     */
    public function setBoppEvent(\WDG\RestBundle\Entity\BoppEvent $boppEvent = null)
    {
        $this->boppEvent = $boppEvent;

        return $this;
    }

    /**
     * Get boppEvent
     *
     * @return \WDG\RestBundle\Entity\BoppEvent 
     */
    public function getBoppEvent()
    {
        return $this->boppEvent;
    }

    /**
     * Set boppNews
     *
     * @param \WDG\RestBundle\Entity\BoppNews $boppNews
     * @return BoppUser
     */
    public function setBoppNews(\WDG\RestBundle\Entity\BoppNews $boppNews = null)
    {
        $this->boppNews = $boppNews;

        return $this;
    }

    /**
     * Get boppNews
     *
     * @return \WDG\RestBundle\Entity\BoppNews 
     */
    public function getBoppNews()
    {
        return $this->boppNews;
    }

    /**
     * Set boppTask
     *
     * @param \WDG\RestBundle\Entity\BoppTask $boppTask
     * @return BoppUser
     */
    public function setBoppTask(\WDG\RestBundle\Entity\BoppTask $boppTask = null)
    {
        $this->boppTask = $boppTask;

        return $this;
    }

    /**
     * Get boppTask
     *
     * @return \WDG\RestBundle\Entity\BoppTask 
     */
    public function getBoppTask()
    {
        return $this->boppTask;
    }
}
