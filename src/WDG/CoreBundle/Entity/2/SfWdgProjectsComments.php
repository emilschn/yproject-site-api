<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgProjectsComments
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgComments", inversedBy="projectsComments")
     * @ORM\JoinColumn(name="sfWdgCommentsId", referencedColumnName="id", nullable=false)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgProjects", inversedBy="projectsComments")
     * @ORM\JoinColumn(name="sfWdgProjectsId", referencedColumnName="id", nullable=false)
     */
    private $projects;
}