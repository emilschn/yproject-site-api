<?php
namespace WDG\CoreBundle\Entity;
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
     * Set projects
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjects $projects
     * @return SfWdgProjectsTags
     */
    public function setProjects(\WDG\CoreBundle\Entity\SfWdgProjects $projects)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * Get projects
     *
     * @return \WDG\CoreBundle\Entity\SfWdgProjects 
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Set tags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTags $tags
     * @return SfWdgProjectsTags
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
