<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgTasks
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
    private $taskName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $taskContent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $taskBegining;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $taskEnding;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $taskProgress;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgUsers", inversedBy="tasks")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", unique=true)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgTasksUsersAssigned", mappedBy="tasks")
     */
    private $tasksUsersAssigned;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgTasksTags", mappedBy="tasks")
     */
    private $tasksTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgTasksComments", mappedBy="tasks")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgProjects", inversedBy="sfWdgTasks")
     * @ORM\JoinColumn(name="sfWdgProjectsId", referencedColumnName="id")
     */
    private $sfWdgProjects;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tasksUsersAssigned = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tasksTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set taskName
     *
     * @param string $taskName
     * @return SfWdgTasks
     */
    public function setTaskName($taskName)
    {
        $this->taskName = $taskName;

        return $this;
    }

    /**
     * Get taskName
     *
     * @return string 
     */
    public function getTaskName()
    {
        return $this->taskName;
    }

    /**
     * Set taskContent
     *
     * @param string $taskContent
     * @return SfWdgTasks
     */
    public function setTaskContent($taskContent)
    {
        $this->taskContent = $taskContent;

        return $this;
    }

    /**
     * Get taskContent
     *
     * @return string 
     */
    public function getTaskContent()
    {
        return $this->taskContent;
    }

    /**
     * Set taskBegining
     *
     * @param \DateTime $taskBegining
     * @return SfWdgTasks
     */
    public function setTaskBegining($taskBegining)
    {
        $this->taskBegining = $taskBegining;

        return $this;
    }

    /**
     * Get taskBegining
     *
     * @return \DateTime 
     */
    public function getTaskBegining()
    {
        return $this->taskBegining;
    }

    /**
     * Set taskEnding
     *
     * @param \DateTime $taskEnding
     * @return SfWdgTasks
     */
    public function setTaskEnding($taskEnding)
    {
        $this->taskEnding = $taskEnding;

        return $this;
    }

    /**
     * Get taskEnding
     *
     * @return \DateTime 
     */
    public function getTaskEnding()
    {
        return $this->taskEnding;
    }

    /**
     * Set taskProgress
     *
     * @param integer $taskProgress
     * @return SfWdgTasks
     */
    public function setTaskProgress($taskProgress)
    {
        $this->taskProgress = $taskProgress;

        return $this;
    }

    /**
     * Get taskProgress
     *
     * @return integer 
     */
    public function getTaskProgress()
    {
        return $this->taskProgress;
    }

    /**
     * Set users
     *
     * @param \WDG\CoreBundle\Entity\SfWdgUsers $users
     * @return SfWdgTasks
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
     * Add tasksUsersAssigned
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasksUsersAssigned $tasksUsersAssigned
     * @return SfWdgTasks
     */
    public function addTasksUsersAssigned(\WDG\CoreBundle\Entity\SfWdgTasksUsersAssigned $tasksUsersAssigned)
    {
        $this->tasksUsersAssigned[] = $tasksUsersAssigned;

        return $this;
    }

    /**
     * Remove tasksUsersAssigned
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasksUsersAssigned $tasksUsersAssigned
     */
    public function removeTasksUsersAssigned(\WDG\CoreBundle\Entity\SfWdgTasksUsersAssigned $tasksUsersAssigned)
    {
        $this->tasksUsersAssigned->removeElement($tasksUsersAssigned);
    }

    /**
     * Get tasksUsersAssigned
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasksUsersAssigned()
    {
        return $this->tasksUsersAssigned;
    }

    /**
     * Add tasksTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasksTags $tasksTags
     * @return SfWdgTasks
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
     * Add comments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasksComments $comments
     * @return SfWdgTasks
     */
    public function addComment(\WDG\CoreBundle\Entity\SfWdgTasksComments $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasksComments $comments
     */
    public function removeComment(\WDG\CoreBundle\Entity\SfWdgTasksComments $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set sfWdgProjects
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjects $sfWdgProjects
     * @return SfWdgTasks
     */
    public function setSfWdgProjects(\WDG\CoreBundle\Entity\SfWdgProjects $sfWdgProjects = null)
    {
        $this->sfWdgProjects = $sfWdgProjects;

        return $this;
    }

    /**
     * Get sfWdgProjects
     *
     * @return \WDG\CoreBundle\Entity\SfWdgProjects 
     */
    public function getSfWdgProjects()
    {
        return $this->sfWdgProjects;
    }
}
