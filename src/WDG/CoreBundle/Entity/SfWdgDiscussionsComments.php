<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgDiscussionsComments
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgComments", inversedBy="discussionsComments")
     * @ORM\JoinColumn(name="sfWdgCommentsId", referencedColumnName="id", nullable=false)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgDiscussions", inversedBy="discussionsComments")
     * @ORM\JoinColumn(name="sfWdgDiscussionsId", referencedColumnName="id", nullable=false)
     */
    private $discussions;

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
     * Set comments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgComments $comments
     * @return SfWdgDiscussionsComments
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

    /**
     * Set discussions
     *
     * @param \WDG\CoreBundle\Entity\SfWdgDiscussions $discussions
     * @return SfWdgDiscussionsComments
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
}
