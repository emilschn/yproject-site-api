<?php
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
}