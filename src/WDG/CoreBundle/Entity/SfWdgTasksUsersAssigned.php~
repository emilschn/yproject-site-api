<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgTasksUsersAssigned
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgTasks", inversedBy="tasksUsersAssigned")
     * @ORM\JoinColumn(name="sfWdgTasksId", referencedColumnName="id", nullable=false)
     */
    private $tasks;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgUsers", inversedBy="tasksUsersAssigned")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", nullable=false)
     */
    private $users;

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
     * Set tasks
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasks $tasks
     * @return SfWdgTasksUsersAssigned
     */
    public function setTasks(\WDG\CoreBundle\Entity\SfWdgTasks $tasks)
    {
        $this->tasks = $tasks;

        return $this;
    }

    /**
     * Get tasks
     *
     * @return \WDG\CoreBundle\Entity\SfWdgTasks 
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Set users
     *
     * @param \WDG\CoreBundle\Entity\SfWdgUsers $users
     * @return SfWdgTasksUsersAssigned
     */
    public function setUsers(\WDG\CoreBundle\Entity\SfWdgUsers $users)
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
}
