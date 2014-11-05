<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgTasksComments
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgTasks", inversedBy="comments")
     * @ORM\JoinColumn(name="sfWdgTasksId", referencedColumnName="id", nullable=false)
     */
    private $tasks;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgComments", inversedBy="tasksComments")
     * @ORM\JoinColumn(name="sfWdgCommentsId", referencedColumnName="id", nullable=false)
     */
    private $comments;
}