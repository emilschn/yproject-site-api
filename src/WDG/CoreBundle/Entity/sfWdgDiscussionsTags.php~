<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class sfWdgDiscussionsTags
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgDiscussions", inversedBy="discussionsTags")
     * @ORM\JoinColumn(name="sfWdgDiscussionsId", referencedColumnName="id", nullable=false)
     */
    private $discussions;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgTags", inversedBy="discussionsTags")
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
     * Set discussions
     *
     * @param \WDG\CoreBundle\Entity\SfWdgDiscussions $discussions
     * @return sfWdgDiscussionsTags
     */
    public function setDiscussions(\WDG\CoreBundle\Entity\SfWdgDiscussions $discussions)
    {
        $this->discussions = $discussions;

        return $this;
    }

    /**
     * Get discussions
     *
     * @return \WDG\CoreBundle\Entity\SfWdgDiscussions 
     */
    public function getDiscussions()
    {
        return $this->discussions;
    }

    /**
     * Set tags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTags $tags
     * @return sfWdgDiscussionsTags
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
