<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgProjectsTags
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgProjects", inversedBy="projectsTags")
     * @ORM\JoinColumn(name="sfWdgProjectsId", referencedColumnName="id", nullable=false)
     */
    private $projects;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgTags", inversedBy="projectsTags")
     * @ORM\JoinColumn(name="sfWdgTagsId", referencedColumnName="id", nullable=false)
     */
    private $tags;
}