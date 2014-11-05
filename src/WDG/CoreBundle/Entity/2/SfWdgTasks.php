<?php
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
     * @ORM\OneToOne(targetEntity="SfWdgProjects", mappedBy="tasks")
     */
    private $projects;

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
}