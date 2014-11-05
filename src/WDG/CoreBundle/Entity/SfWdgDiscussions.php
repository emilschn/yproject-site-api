<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgDiscussions
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
    private $discussionTitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $discussionContent;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $discussionPrivacy;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $discussionType;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgProjects", inversedBy="discussions")
     * @ORM\JoinColumn(name="sfWdgProjectsId", referencedColumnName="id", unique=false)
     */
    private $projects;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgUsers", inversedBy="discussions")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", unique=false)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="sfWdgDiscussionsTags", mappedBy="discussions")
     */
    private $discussionsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgDiscussionsComments", mappedBy="discussions")
     */
    private $discussionsComments;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->discussionsTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->discussionsComments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set discussionTitle
     *
     * @param string $discussionTitle
     * @return SfWdgDiscussions
     */
    public function setDiscussionTitle($discussionTitle)
    {
        $this->discussionTitle = $discussionTitle;

        return $this;
    }

    /**
     * Get discussionTitle
     *
     * @return string 
     */
    public function getDiscussionTitle()
    {
        return $this->discussionTitle;
    }

    /**
     * Set discussionContent
     *
     * @param string $discussionContent
     * @return SfWdgDiscussions
     */
    public function setDiscussionContent($discussionContent)
    {
        $this->discussionContent = $discussionContent;

        return $this;
    }

    /**
     * Get discussionContent
     *
     * @return string 
     */
    public function getDiscussionContent()
    {
        return $this->discussionContent;
    }

    /**
     * Set discussionPrivacy
     *
     * @param integer $discussionPrivacy
     * @return SfWdgDiscussions
     */
    public function setDiscussionPrivacy($discussionPrivacy)
    {
        $this->discussionPrivacy = $discussionPrivacy;

        return $this;
    }

    /**
     * Get discussionPrivacy
     *
     * @return integer 
     */
    public function getDiscussionPrivacy()
    {
        return $this->discussionPrivacy;
    }

    /**
     * Set discussionType
     *
     * @param integer $discussionType
     * @return SfWdgDiscussions
     */
    public function setDiscussionType($discussionType)
    {
        $this->discussionType = $discussionType;

        return $this;
    }

    /**
     * Get discussionType
     *
     * @return integer 
     */
    public function getDiscussionType()
    {
        return $this->discussionType;
    }

    /**
     * Set projects
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjects $projects
     * @return SfWdgDiscussions
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
     * @return SfWdgDiscussions
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
     * Add discussionsTags
     *
     * @param \WDG\CoreBundle\Entity\sfWdgDiscussionsTags $discussionsTags
     * @return SfWdgDiscussions
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
     * Add discussionsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgDiscussionsComments $discussionsComments
     * @return SfWdgDiscussions
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


    
        public function __toString()
    {
        return $this->discussionTitle;
    }
}
