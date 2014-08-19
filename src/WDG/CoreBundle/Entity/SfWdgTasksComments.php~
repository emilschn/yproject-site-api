<?php
namespace WDG\CoreBundle\Entity;
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
     * @return SfWdgTasksComments
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
     * Set comments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgComments $comments
     * @return SfWdgTasksComments
     */
    public function setComments(\WDG\CoreBundle\Entity\SfWdgComments $comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return \WDG\CoreBundle\Entity\SfWdgComments 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
