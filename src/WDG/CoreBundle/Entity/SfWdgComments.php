<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgComments
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentContent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $commentDate;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgUsers", inversedBy="comments")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", unique=true)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsComments", mappedBy="comments")
     */
    private $projectsComments;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgEventsComments", mappedBy="comments")
     */
    private $eventsComments;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgDiscussionsComments", mappedBy="comments")
     */
    private $discussionsComments;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgNewsComments", mappedBy="comments")
     */
    private $newsComments;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgTasksComments", mappedBy="comments")
     */
    private $tasksComments;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projectsComments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eventsComments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->discussionsComments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->newsComments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tasksComments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set commentContent
     *
     * @param string $commentContent
     * @return SfWdgComments
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;

        return $this;
    }

    /**
     * Get commentContent
     *
     * @return string 
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * Set commentDate
     *
     * @param \DateTime $commentDate
     * @return SfWdgComments
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;

        return $this;
    }

    /**
     * Get commentDate
     *
     * @return \DateTime 
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * Set users
     *
     * @param \WDG\CoreBundle\Entity\SfWdgUsers $users
     * @return SfWdgComments
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
     * Add projectsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsComments $projectsComments
     * @return SfWdgComments
     */
    public function addProjectsComment(\WDG\CoreBundle\Entity\SfWdgProjectsComments $projectsComments)
    {
        $this->projectsComments[] = $projectsComments;

        return $this;
    }

    /**
     * Remove projectsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsComments $projectsComments
     */
    public function removeProjectsComment(\WDG\CoreBundle\Entity\SfWdgProjectsComments $projectsComments)
    {
        $this->projectsComments->removeElement($projectsComments);
    }

    /**
     * Get projectsComments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectsComments()
    {
        return $this->projectsComments;
    }

    /**
     * Add eventsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgEventsComments $eventsComments
     * @return SfWdgComments
     */
    public function addEventsComment(\WDG\CoreBundle\Entity\SfWdgEventsComments $eventsComments)
    {
        $this->eventsComments[] = $eventsComments;

        return $this;
    }

    /**
     * Remove eventsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgEventsComments $eventsComments
     */
    public function removeEventsComment(\WDG\CoreBundle\Entity\SfWdgEventsComments $eventsComments)
    {
        $this->eventsComments->removeElement($eventsComments);
    }

    /**
     * Get eventsComments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEventsComments()
    {
        return $this->eventsComments;
    }

    /**
     * Add discussionsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgDiscussionsComments $discussionsComments
     * @return SfWdgComments
     */
    public function addDiscussionsComment(\WDG\CoreBundle\Entity\SfWdgDiscussionsComments $discussionsComments)
    {
        $this->discussionsComments[] = $discussionsComments;

        return $this;
    }

    /**
     * Remove discussionsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgDiscussionsComments $discussionsComments
     */
    public function removeDiscussionsComment(\WDG\CoreBundle\Entity\SfWdgDiscussionsComments $discussionsComments)
    {
        $this->discussionsComments->removeElement($discussionsComments);
    }

    /**
     * Get discussionsComments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDiscussionsComments()
    {
        return $this->discussionsComments;
    }

    /**
     * Add newsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNewsComments $newsComments
     * @return SfWdgComments
     */
    public function addNewsComment(\WDG\CoreBundle\Entity\SfWdgNewsComments $newsComments)
    {
        $this->newsComments[] = $newsComments;

        return $this;
    }

    /**
     * Remove newsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNewsComments $newsComments
     */
    public function removeNewsComment(\WDG\CoreBundle\Entity\SfWdgNewsComments $newsComments)
    {
        $this->newsComments->removeElement($newsComments);
    }

    /**
     * Get newsComments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNewsComments()
    {
        return $this->newsComments;
    }

    /**
     * Add tasksComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasksComments $tasksComments
     * @return SfWdgComments
     */
    public function addTasksComment(\WDG\CoreBundle\Entity\SfWdgTasksComments $tasksComments)
    {
        $this->tasksComments[] = $tasksComments;

        return $this;
    }

    /**
     * Remove tasksComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasksComments $tasksComments
     */
    public function removeTasksComment(\WDG\CoreBundle\Entity\SfWdgTasksComments $tasksComments)
    {
        $this->tasksComments->removeElement($tasksComments);
    }

    /**
     * Get tasksComments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasksComments()
    {
        return $this->tasksComments;
    }
}
