<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgTasksTags
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgTasks", inversedBy="tasksTags")
     * @ORM\JoinColumn(name="sfWdgTasksId", referencedColumnName="id", nullable=false)
     */
    private $tasks;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgTags", inversedBy="tasksTags")
     * @ORM\JoinColumn(name="sfWdgTagsId", referencedColumnName="id", nullable=false)
     */
    private $tags;

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
     * @return SfWdgTasksTags
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
     * Set tags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTags $tags
     * @return SfWdgTasksTags
     */
    public function setTags(\WDG\CoreBundle\Entity\SfWdgTags $tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return \WDG\CoreBundle\Entity\SfWdgTags 
     */
    public function getTags()
    {
        return $this->tags;
    }
}
