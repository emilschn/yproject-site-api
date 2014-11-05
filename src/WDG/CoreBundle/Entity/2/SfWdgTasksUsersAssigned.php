<?php
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
}