<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\BoppEvent
 *
 * @ORM\Entity(repositoryClass="BoppEventRepository")
 * @ORM\Table(name="bopp_event", indexes={@ORM\Index(name="fk_bopp_event_bopp_project1_idx", columns={"bopp_project_id"}), @ORM\Index(name="fk_bopp_event_bopp_user1_idx", columns={"bopp_user_id"})})
 */
class BoppEvent
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $event_name;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $event_description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $event_begining;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $event_ending;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $event_privacy;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $bopp_project_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bopp_user_id;

    /**
     * @ORM\OneToMany(targetEntity="BoppEventStatusGuest", mappedBy="boppEvent")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_event_id")
     */
    protected $boppEventStatusGuests;

    /**
     * @ORM\ManyToOne(targetEntity="BoppProject", inversedBy="boppEvents")
     * @ORM\JoinColumn(name="bopp_project_id", referencedColumnName="id")
     */
    protected $boppProject;

    /**
     * @ORM\OneToOne(targetEntity="BoppUser", inversedBy="boppEvent")
     * @ORM\JoinColumn(name="bopp_user_id", referencedColumnName="id")
     */
    protected $boppUser;

    /**
     * @ORM\ManyToMany(targetEntity="BoppComment", inversedBy="boppEvents")
     * @ORM\JoinTable(name="bopp_event_comment",
     *     joinColumns={@ORM\JoinColumn(name="bopp_event_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="bopp_comment_id", referencedColumnName="id")}
     * )
     */
    protected $boppComments;

    /**
     * @ORM\ManyToMany(targetEntity="BoppTag", mappedBy="boppEvents")
     */
    protected $boppTags;

    public function __construct()
    {
        $this->boppEventStatusGuests = new ArrayCollection();
        $this->boppComments = new ArrayCollection();
        $this->boppTags = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\BoppEvent
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
     * Set the value of event_name.
     *
     * @param string $event_name
     * @return \Entity\BoppEvent
     */
    public function setEventName($event_name)
    {
        $this->event_name = $event_name;

        return $this;
    }

    /**
     * Get the value of event_name.
     *
     * @return string
     */
    public function getEventName()
    {
        return $this->event_name;
    }

    /**
     * Set the value of event_description.
     *
     * @param string $event_description
     * @return \Entity\BoppEvent
     */
    public function setEventDescription($event_description)
    {
        $this->event_description = $event_description;

        return $this;
    }

    /**
     * Get the value of event_description.
     *
     * @return string
     */
    public function getEventDescription()
    {
        return $this->event_description;
    }

    /**
     * Set the value of event_begining.
     *
     * @param datetime $event_begining
     * @return \Entity\BoppEvent
     */
    public function setEventBegining($event_begining)
    {
        $this->event_begining = $event_begining;

        return $this;
    }

    /**
     * Get the value of event_begining.
     *
     * @return datetime
     */
    public function getEventBegining()
    {
        return $this->event_begining;
    }

    /**
     * Set the value of event_ending.
     *
     * @param datetime $event_ending
     * @return \Entity\BoppEvent
     */
    public function setEventEnding($event_ending)
    {
        $this->event_ending = $event_ending;

        return $this;
    }

    /**
     * Get the value of event_ending.
     *
     * @return datetime
     */
    public function getEventEnding()
    {
        return $this->event_ending;
    }

    /**
     * Set the value of event_privacy.
     *
     * @param integer $event_privacy
     * @return \Entity\BoppEvent
     */
    public function setEventPrivacy($event_privacy)
    {
        $this->event_privacy = $event_privacy;

        return $this;
    }

    /**
     * Get the value of event_privacy.
     *
     * @return integer
     */
    public function getEventPrivacy()
    {
        return $this->event_privacy;
    }

    /**
     * Set the value of bopp_project_id.
     *
     * @param integer $bopp_project_id
     * @return \Entity\BoppEvent
     */
    public function setBoppProjectId($bopp_project_id)
    {
        $this->bopp_project_id = $bopp_project_id;

        return $this;
    }

    /**
     * Get the value of bopp_project_id.
     *
     * @return integer
     */
    public function getBoppProjectId()
    {
        return $this->bopp_project_id;
    }

    /**
     * Set the value of bopp_user_id.
     *
     * @param integer $bopp_user_id
     * @return \Entity\BoppEvent
     */
    public function setBoppUserId($bopp_user_id)
    {
        $this->bopp_user_id = $bopp_user_id;

        return $this;
    }

    /**
     * Get the value of bopp_user_id.
     *
     * @return integer
     */
    public function getBoppUserId()
    {
        return $this->bopp_user_id;
    }

    /**
     * Add BoppEventStatusGuest entity to collection (one to many).
     *
     * @param \Entity\BoppEventStatusGuest $boppEventStatusGuest
     * @return \Entity\BoppEvent
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
     * @return \Entity\BoppEvent
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
     * Set BoppProject entity (many to one).
     *
     * @param \Entity\BoppProject $boppProject
     * @return \Entity\BoppEvent
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

    /**
     * Set BoppUser entity (one to one).
     *
     * @param \Entity\BoppUser $boppUser
     * @return \Entity\BoppEvent
     */
    public function setBoppUser(BoppUser $boppUser)
    {
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
     * Add BoppComment entity to collection.
     *
     * @param \Entity\BoppComment $boppComment
     * @return \Entity\BoppEvent
     */
    public function addBoppComment(BoppComment $boppComment)
    {
        $boppComment->addBoppEvent($this);
        $this->boppComments[] = $boppComment;

        return $this;
    }

    /**
     * Remove BoppComment entity from collection.
     *
     * @param \Entity\BoppComment $boppComment
     * @return \Entity\BoppEvent
     */
    public function removeBoppComment(BoppComment $boppComment)
    {
        $boppComment->removeBoppEvent($this);
        $this->boppComments->removeElement($boppComment);

        return $this;
    }

    /**
     * Get BoppComment entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppComments()
    {
        return $this->boppComments;
    }

    /**
     * Add BoppTag entity to collection.
     *
     * @param \Entity\BoppTag $boppTag
     * @return \Entity\BoppEvent
     */
    public function addBoppTag(BoppTag $boppTag)
    {
        $this->boppTags[] = $boppTag;

        return $this;
    }

    /**
     * Remove BoppTag entity from collection.
     *
     * @param \Entity\BoppTag $boppTag
     * @return \Entity\BoppEvent
     */
    public function removeBoppTag(BoppTag $boppTag)
    {
        $this->boppTags->removeElement($boppTag);

        return $this;
    }

    /**
     * Get BoppTag entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppTags()
    {
        return $this->boppTags;
    }

    public function __sleep()
    {
        return array('id', 'event_name', 'event_description', 'event_begining', 'event_ending', 'event_privacy', 'bopp_project_id', 'bopp_user_id');
    }
}