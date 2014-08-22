<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgTags
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
    private $tagName;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $tagType;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgNewsTags", mappedBy="tags")
     */
    private $newsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgTasksTags", mappedBy="tags")
     */
    private $tasksTags;

    /**
     * @ORM\OneToMany(targetEntity="sfWdgDiscussionsTags", mappedBy="tags")
     */
    private $discussionsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgEventsTags", mappedBy="tags")
     */
    private $eventsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsTags", mappedBy="tags")
     */
    private $projectsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgEventsComments", mappedBy="tags")
     */
    private $eventsComments;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->newsTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tasksTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->discussionsTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eventsTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projectsTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eventsComments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tagName
     *
     * @param string $tagName
     * @return SfWdgTags
     */
    public function setTagName($tagName)
    {
        $this->tagName = $tagName;

        return $this;
    }

    /**
     * Get tagName
     *
     * @return string 
     */
    public function getTagName()
    {
        return $this->tagName;
    }

    /**
     * Set tagType
     *
     * @param integer $tagType
     * @return SfWdgTags
     */
    public function setTagType($tagType)
    {
        $this->tagType = $tagType;

        return $this;
    }

    /**
     * Get tagType
     *
     * @return integer 
     */
    public function getTagType()
    {
        return $this->tagType;
    }

    /**
     * Add newsTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNewsTags $newsTags
     * @return SfWdgTags
     */
    public function addNewsTag(\WDG\CoreBundle\Entity\SfWdgNewsTags $newsTags)
    {
        $this->newsTags[] = $newsTags;

        return $this;
    }

    /**
     * Remove newsTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNewsTags $newsTags
     */
    public function removeNewsTag(\WDG\CoreBundle\Entity\SfWdgNewsTags $newsTags)
    {
        $this->newsTags->removeElement($newsTags);
    }

    /**
     * Get newsTags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNewsTags()
    {
        return $this->newsTags;
    }

    /**
     * Add tasksTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasksTags $tasksTags
     * @return SfWdgTags
     */
    public function addTasksTag(\WDG\CoreBundle\Entity\SfWdgTasksTags $tasksTags)
    {
        $this->tasksTags[] = $tasksTags;

        return $this;
    }

    /**
     * Remove tasksTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasksTags $tasksTags
     */
    public function removeTasksTag(\WDG\CoreBundle\Entity\SfWdgTasksTags $tasksTags)
    {
        $this->tasksTags->removeElement($tasksTags);
    }

    /**
     * Get tasksTags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasksTags()
    {
        return $this->tasksTags;
    }

    /**
     * Add discussionsTags
     *
     * @param \WDG\CoreBundle\Entity\sfWdgDiscussionsTags $discussionsTags
     * @return SfWdgTags
     */
    public function addDiscussionsTag(\WDG\CoreBundle\Entity\sfWdgDiscussionsTags $discussionsTags)
    {
        $this->discussionsTags[] = $discussionsTags;

        return $this;
    }

    /**
     * Remove discussionsTags
     *
     * @param \WDG\CoreBundle\Entity\sfWdgDiscussionsTags $discussionsTags
     */
    public function removeDiscussionsTag(\WDG\CoreBundle\Entity\sfWdgDiscussionsTags $discussionsTags)
    {
        $this->discussionsTags->removeElement($discussionsTags);
    }

    /**
     * Get discussionsTags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDiscussionsTags()
    {
        return $this->discussionsTags;
    }

    /**
     * Add eventsTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgEventsTags $eventsTags
     * @return SfWdgTags
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

    /**
     * Add projectsTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsTags $projectsTags
     * @return SfWdgTags
     */
    public function addProjectsTag(\WDG\CoreBundle\Entity\SfWdgProjectsTags $projectsTags)
    {
        $this->projectsTags[] = $projectsTags;

        return $this;
    }

    /**
     * Remove projectsTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsTags $projectsTags
     */
    public function removeProjectsTag(\WDG\CoreBundle\Entity\SfWdgProjectsTags $projectsTags)
    {
        $this->projectsTags->removeElement($projectsTags);
    }

    /**
     * Get projectsTags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectsTags()
    {
        return $this->projectsTags;
    }

    /**
     * Add eventsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgEventsComments $eventsComments
     * @return SfWdgTags
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
}
