<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgEvents
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
    private $eventName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $eventDescription;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $eventBegining;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $eventEnding;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $eventPrivacy;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgProjects", inversedBy="events")
     * @ORM\JoinColumn(name="sfWdgProjectsId", referencedColumnName="id", unique=true)
     */
    private $projects;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgUsers", inversedBy="events")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", unique=true)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgEventsTags", mappedBy="events")
     */
    private $eventsTags;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eventsTags = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set eventName
     *
     * @param string $eventName
     * @return SfWdgEvents
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;

        return $this;
    }

    /**
     * Get eventName
     *
     * @return string 
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * Set eventDescription
     *
     * @param string $eventDescription
     * @return SfWdgEvents
     */
    public function setEventDescription($eventDescription)
    {
        $this->eventDescription = $eventDescription;

        return $this;
    }

    /**
     * Get eventDescription
     *
     * @return string 
     */
    public function getEventDescription()
    {
        return $this->eventDescription;
    }

    /**
     * Set eventBegining
     *
     * @param \DateTime $eventBegining
     * @return SfWdgEvents
     */
    public function setEventBegining($eventBegining)
    {
        $this->eventBegining = $eventBegining;

        return $this;
    }

    /**
     * Get eventBegining
     *
     * @return \DateTime 
     */
    public function getEventBegining()
    {
        return $this->eventBegining;
    }

    /**
     * Set eventEnding
     *
     * @param \DateTime $eventEnding
     * @return SfWdgEvents
     */
    public function setEventEnding($eventEnding)
    {
        $this->eventEnding = $eventEnding;

        return $this;
    }

    /**
     * Get eventEnding
     *
     * @return \DateTime 
     */
    public function getEventEnding()
    {
        return $this->eventEnding;
    }

    /**
     * Set eventPrivacy
     *
     * @param integer $eventPrivacy
     * @return SfWdgEvents
     */
    public function setEventPrivacy($eventPrivacy)
    {
        $this->eventPrivacy = $eventPrivacy;

        return $this;
    }

    /**
     * Get eventPrivacy
     *
     * @return integer 
     */
    public function getEventPrivacy()
    {
        return $this->eventPrivacy;
    }

    /**
     * Set projects
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjects $projects
     * @return SfWdgEvents
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

    /**
     * Set users
     *
     * @param \WDG\CoreBundle\Entity\SfWdgUsers $users
     * @return SfWdgEvents
     */
    public function setUsers(\WDG\CoreBundle\Entity\SfWdgUsers $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \WDG\CoreBundle\Entity\SfWdgUsers 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add eventsTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgEventsTags $eventsTags
     * @return SfWdgEvents
     */
    public function addEventsTag(\WDG\CoreBundle\Entity\SfWdgEventsTags $eventsTags)
    {
        $this->eventsTags[] = $eventsTags;

        return $this;
    }

    /**
     * Remove eventsTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgEventsTags $eventsTags
     */
    public function removeEventsTag(\WDG\CoreBundle\Entity\SfWdgEventsTags $eventsTags)
    {
        $this->eventsTags->removeElement($eventsTags);
    }

    /**
     * Get eventsTags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEventsTags()
    {
        return $this->eventsTags;
    }
}
