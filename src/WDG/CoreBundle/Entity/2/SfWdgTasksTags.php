<?php
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
}