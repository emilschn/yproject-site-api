<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgNews
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
    private $newsTitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $newsContent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $newsDate;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgProjects", inversedBy="news")
     * @ORM\JoinColumn(name="sfWdgProjectsId", referencedColumnName="id", unique=true)
     */
    private $projects;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgUsers", inversedBy="news")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", unique=true)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgNewsTags", mappedBy="news")
     */
    private $newsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgNewsComments", mappedBy="news")
     */
    private $newsComments;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->newsTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->newsComments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set newsTitle
     *
     * @param string $newsTitle
     * @return SfWdgNews
     */
    public function setNewsTitle($newsTitle)
    {
        $this->newsTitle = $newsTitle;

        return $this;
    }

    /**
     * Get newsTitle
     *
     * @return string 
     */
    public function getNewsTitle()
    {
        return $this->newsTitle;
    }

    /**
     * Set newsContent
     *
     * @param string $newsContent
     * @return SfWdgNews
     */
    public function setNewsContent($newsContent)
    {
        $this->newsContent = $newsContent;

        return $this;
    }

    /**
     * Get newsContent
     *
     * @return string 
     */
    public function getNewsContent()
    {
        return $this->newsContent;
    }

    /**
     * Set newsDate
     *
     * @param \DateTime $newsDate
     * @return SfWdgNews
     */
    public function setNewsDate($newsDate)
    {
        $this->newsDate = $newsDate;

        return $this;
    }

    /**
     * Get newsDate
     *
     * @return \DateTime 
     */
    public function getNewsDate()
    {
        return $this->newsDate;
    }

    /**
     * Set projects
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjects $projects
     * @return SfWdgNews
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
     * @return SfWdgNews
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
     * Add newsTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNewsTags $newsTags
     * @return SfWdgNews
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
     * Add newsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNewsComments $newsComments
     * @return SfWdgNews
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
}
