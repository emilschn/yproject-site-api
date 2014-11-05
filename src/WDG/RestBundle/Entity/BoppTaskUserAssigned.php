<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\BoppTaskUserAssigned
 *
 * @ORM\Entity(repositoryClass="BoppTaskUserAssignedRepository")
 * @ORM\Table(name="bopp_task_user_assigned", indexes={@ORM\Index(name="fk_bopp_task_has_bopp_user_bopp_user1_idx", columns={"bopp_user_id"}), @ORM\Index(name="fk_bopp_task_has_bopp_user_bopp_task1_idx", columns={"bopp_task_id"})})
 */
class BoppTaskUserAssigned
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $bopp_task_id;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $bopp_user_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $task_user_status;

    /**
     * @ORM\ManyToOne(targetEntity="BoppTask", inversedBy="boppTaskUserAssigneds")
     * @ORM\JoinColumn(name="bopp_task_id", referencedColumnName="id")
     */
    protected $boppTask;

    /**
     * @ORM\ManyToOne(targetEntity="BoppUser", inversedBy="boppTaskUserAssigneds")
     * @ORM\JoinColumn(name="bopp_user_id", referencedColumnName="id")
     */
    protected $boppUser;

    public function __construct()
    {
    }

    /**
     * Set the value of bopp_task_id.
     *
     * @param integer $bopp_task_id
     * @return \Entity\BoppTaskUserAssigned
     */
    public function setBoppTaskId($bopp_task_id)
    {
        $this->bopp_task_id = $bopp_task_id;

        return $this;
    }

    /**
     * Get the value of bopp_task_id.
     *
     * @return integer
     */
    public function getBoppTaskId()
    {
        return $this->bopp_task_id;
    }

    /**
     * Set the value of bopp_user_id.
     *
     * @param integer $bopp_user_id
     * @return \Entity\BoppTaskUserAssigned
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
     * Set the value of task_user_status.
     *
     * @param integer $task_user_status
     * @return \Entity\BoppTaskUserAssigned
     */
    public function setTaskUserStatus($task_user_status)
    {
        $this->task_user_status = $task_user_status;

        return $this;
    }

    /**
     * Get the value of task_user_status.
     *
     * @return integer
     */
    public function getTaskUserStatus()
    {
        return $this->task_user_status;
    }

    /**
     * Set BoppTask entity (many to one).
     *
     * @param \Entity\BoppTask $boppTask
     * @return \Entity\BoppTaskUserAssigned
     */
    public function setBoppTask(BoppTask $boppTask = null)
    {
        $this->boppTask = $boppTask;

        return $this;
    }

    /**
     * Get BoppTask entity (many to one).
     *
     * @return \Entity\BoppTask
     */
    public function getBoppTask()
    {
        return $this->boppTask;
    }

    /**
     * Set BoppUser entity (many to one).
     *
     * @param \Entity\BoppUser $boppUser
     * @return \Entity\BoppTaskUserAssigned
     */
    public function setBoppUser(BoppUser $boppUser = null)
    {
        $this->boppUser = $boppUser;

        return $this;
    }

    /**
     * Get BoppUser entity (many to one).
     *
     * @return \Entity\BoppUser
     */
    public function getBoppUser()
    {
        return $this->boppUser;
    }

    public function __sleep()
    {
        return array('bopp_task_id', 'bopp_user_id', 'task_user_status');
    }
}