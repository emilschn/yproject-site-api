<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgProjects
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", unique=true, nullable=true)
     */
    private $wpProjectId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $projectName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectDescription;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgOrganisations", inversedBy="projects")
     * @ORM\JoinColumn(name="sfWdgOrganisationsId", referencedColumnName="id", unique=true)
     */
    private $organisations;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgEvents", mappedBy="projects")
     */
    private $events;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgNews", mappedBy="projects")
     */
    private $news;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgDiscussions", mappedBy="projects")
     */
    private $discussions;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgTasks", mappedBy="sfWdgProjects")
     */
    private $sfWdgTasks;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsUsers", mappedBy="projects")
     */
    private $projectsUsers;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsTags", mappedBy="projects")
     */
    private $projectsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsComments", mappedBy="projects")
     */
    private $projectsComments;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sfWdgTasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projectsUsers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projectsTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projectsComments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set wpProjectId
     *
     * @param integer $wpProjectId
     * @return SfWdgProjects
     */
    public function setWpProjectId($wpProjectId)
    {
        $this->wpProjectId = $wpProjectId;

        return $this;
    }

    /**
     * Get wpProjectId
     *
     * @return integer 
     */
    public function getWpProjectId()
    {
        return $this->wpProjectId;
    }

    /**
     * Set projectName
     *
     * @param string $projectName
     * @return SfWdgProjects
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string 
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set projectDescription
     *
     * @param string $projectDescription
     * @return SfWdgProjects
     */
    public function setProjectDescription($projectDescription)
    {
        $this->projectDescription = $projectDescription;

        return $this;
    }

    /**
     * Get projectDescription
     *
     * @return string 
     */
    public function getProjectDescription()
    {
        return $this->projectDescription;
    }

    /**
     * Set organisations
     *
     * @param \WDG\CoreBundle\Entity\SfWdgOrganisations $organisations
     * @return SfWdgProjects
     */
    public function setOrganisations(\WDG\CoreBundle\Entity\SfWdgOrganisations $organisations = null)
    {
        $this->organisations = $organisations;

        return $this;
    }

    /**
     * Get organisations
     *
     * @return \WDG\CoreBundle\Entity\SfWdgOrganisations 
     */
    public function getOrganisations()
    {
        return $this->organisations;
    }

    /**
     * Set events
     *
     * @param \WDG\CoreBundle\Entity\SfWdgEvents $events
     * @return SfWdgProjects
     */
    public function setEvents(\WDG\CoreBundle\Entity\SfWdgEvents $events = null)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * Get events
     *
     * @return \WDG\CoreBundle\Entity\SfWdgEvents 
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set news
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNews $news
     * @return SfWdgProjects
     */
    public function setNews(\WDG\CoreBundle\Entity\SfWdgNews $news = null)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return \WDG\CoreBundle\Entity\SfWdgNews 
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Set discussions
     *
     * @param \WDG\CoreBundle\Entity\SfWdgDiscussions $discussions
     * @return SfWdgProjects
     */
    public function setDiscussions(\WDG\CoreBundle\Entity\SfWdgDiscussions $discussions = null)
    {
        $this->discussions = $discussions;

        return $this;
    }

    /**
     * Get discussions
     *
     * @return \WDG\CoreBundle\Entity\SfWdgDiscussions 
     */
    public function getDiscussions()
    {
        return $this->discussions;
    }

    /**
     * Add sfWdgTasks
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasks $sfWdgTasks
     * @return SfWdgProjects
     */
    public function addSfWdgTask(\WDG\CoreBundle\Entity\SfWdgTasks $sfWdgTasks)
    {
        $this->sfWdgTasks[] = $sfWdgTasks;

        return $this;
    }

    /**
     * Remove sfWdgTasks
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasks $sfWdgTasks
     */
    public function removeSfWdgTask(\WDG\CoreBundle\Entity\SfWdgTasks $sfWdgTasks)
    {
        $this->sfWdgTasks->removeElement($sfWdgTasks);
    }

    /**
     * Get sfWdgTasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSfWdgTasks()
    {
        return $this->sfWdgTasks;
    }

    /**
     * Add projectsUsers
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers
     * @return SfWdgProjects
     */
    public function addProjectsUser(\WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers)
    {
        $this->projectsUsers[] = $projectsUsers;

        return $this;
    }

    /**
     * Remove projectsUsers
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers
     */
    public function removeProjectsUser(\WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers)
    {
        $this->projectsUsers->removeElement($projectsUsers);
    }

    /**
     * Get projectsUsers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectsUsers()
    {
        return $this->projectsUsers;
    }

    /**
     * Add projectsTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsTags $projectsTags
     * @return SfWdgProjects
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
     * Add projectsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsComments $projectsComments
     * @return SfWdgProjects
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
    
    public function __toString()
    {
        return $this->projectName;
    }
}