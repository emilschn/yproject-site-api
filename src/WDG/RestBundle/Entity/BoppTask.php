<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\BoppTask
 *
 * @ORM\Entity(repositoryClass="BoppTaskRepository")
 * @ORM\Table(name="bopp_task", indexes={@ORM\Index(name="fk_bopp_tasks_bopp_project1_idx", columns={"bopp_project_id"}), @ORM\Index(name="fk_bopp_task_bopp_user1_idx", columns={"bopp_user_id"})})
 */
class BoppTask
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
    protected $task_name;

    /**
     * @ORM\Column(type="text")
     */
    protected $task_content;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $task_begining;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $task_ending;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $task_progress;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bopp_project_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bopp_user_id;

    /**
     * @ORM\OneToMany(targetEntity="BoppTaskUserAssigned", mappedBy="boppTask")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_task_id")
     */
    protected $boppTaskUserAssigneds;

    /**
     * @ORM\ManyToOne(targetEntity="BoppProject", inversedBy="boppTasks")
     * @ORM\JoinColumn(name="bopp_project_id", referencedColumnName="id")
     */
    protected $boppProject;

    /**
     * @ORM\OneToOne(targetEntity="BoppUser", inversedBy="boppTask")
     * @ORM\JoinColumn(name="bopp_user_id", referencedColumnName="id")
     */
    protected $boppUser;

    /**
     * @ORM\ManyToMany(targetEntity="BoppTag", inversedBy="boppTasks")
     * @ORM\JoinTable(name="bopp_task_tag",
     *     joinColumns={@ORM\JoinColumn(name="bopp_task_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="bopp_tag_id", referencedColumnName="id")}
     * )
     */
    protected $boppTags;

    /**
     * @ORM\ManyToMany(targetEntity="BoppComment", mappedBy="boppTasks")
     */
    protected $boppComments;

    public function __construct()
    {
        $this->boppTaskUserAssigneds = new ArrayCollection();
        $this->boppTags = new ArrayCollection();
        $this->boppComments = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\BoppTask
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
     * Set the value of task_name.
     *
     * @param string $task_name
     * @return \Entity\BoppTask
     */
    public function setTaskName($task_name)
    {
        $this->task_name = $task_name;

        return $this;
    }

    /**
     * Get the value of task_name.
     *
     * @return string
     */
    public function getTaskName()
    {
        return $this->task_name;
    }

    /**
     * Set the value of task_content.
     *
     * @param string $task_content
     * @return \Entity\BoppTask
     */
    public function setTaskContent($task_content)
    {
        $this->task_content = $task_content;

        return $this;
    }

    /**
     * Get the value of task_content.
     *
     * @return string
     */
    public function getTaskContent()
    {
        return $this->task_content;
    }

    /**
     * Set the value of task_begining.
     *
     * @param datetime $task_begining
     * @return \Entity\BoppTask
     */
    public function setTaskBegining($task_begining)
    {
        $this->task_begining = $task_begining;

        return $this;
    }

    /**
     * Get the value of task_begining.
     *
     * @return datetime
     */
    public function getTaskBegining()
    {
        return $this->task_begining;
    }

    /**
     * Set the value of task_ending.
     *
     * @param datetime $task_ending
     * @return \Entity\BoppTask
     */
    public function setTaskEnding($task_ending)
    {
        $this->task_ending = $task_ending;

        return $this;
    }

    /**
     * Get the value of task_ending.
     *
     * @return datetime
     */
    public function getTaskEnding()
    {
        return $this->task_ending;
    }

    /**
     * Set the value of task_progress.
     *
     * @param integer $task_progress
     * @return \Entity\BoppTask
     */
    public function setTaskProgress($task_progress)
    {
        $this->task_progress = $task_progress;

        return $this;
    }

    /**
     * Get the value of task_progress.
     *
     * @return integer
     */
    public function getTaskProgress()
    {
        return $this->task_progress;
    }

    /**
     * Set the value of bopp_project_id.
     *
     * @param integer $bopp_project_id
     * @return \Entity\BoppTask
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
     * @return \Entity\BoppTask
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
     * Add BoppTaskUserAssigned entity to collection (one to many).
     *
     * @param \Entity\BoppTaskUserAssigned $boppTaskUserAssigned
     * @return \Entity\BoppTask
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
     * @return \Entity\BoppTask
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

    /**
     * Set BoppProject entity (many to one).
     *
     * @param \Entity\BoppProject $boppProject
     * @return \Entity\BoppTask
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
     * @return \Entity\BoppTask
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
     * Add BoppTag entity to collection.
     *
     * @param \Entity\BoppTag $boppTag
     * @return \Entity\BoppTask
     */
    public function addBoppTag(BoppTag $boppTag)
    {
        $boppTag->addBoppTask($this);
        $this->boppTags[] = $boppTag;

        return $this;
    }

    /**
     * Remove BoppTag entity from collection.
     *
     * @param \Entity\BoppTag $boppTag
     * @return \Entity\BoppTask
     */
    public function removeBoppTag(BoppTag $boppTag)
    {
        $boppTag->removeBoppTask($this);
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

    /**
     * Add BoppComment entity to collection.
     *
     * @param \Entity\BoppComment $boppComment
     * @return \Entity\BoppTask
     */
    public function addBoppComment(BoppComment $boppComment)
    {
        $this->boppComments[] = $boppComment;

        return $this;
    }

    /**
     * Remove BoppComment entity from collection.
     *
     * @param \Entity\BoppComment $boppComment
     * @return \Entity\BoppTask
     */
    public function removeBoppComment(BoppComment $boppComment)
    {
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

    public function __sleep()
    {
        return array('id', 'task_name', 'task_content', 'task_begining', 'task_ending', 'task_progress', 'bopp_project_id', 'bopp_user_id');
    }
}