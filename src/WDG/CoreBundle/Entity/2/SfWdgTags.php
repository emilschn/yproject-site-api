<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgTags
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $tagName;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $tagType;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgNewsTags", mappedBy="tags")
     */
    private $newsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgTasksTags", mappedBy="tags")
     */
    private $tasksTags;

    /**
     * @ORM\OneToMany(targetEntity="sfWdgDiscussionsTags", mappedBy="tags")
     */
    private $discussionsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgEventsTags", mappedBy="tags")
     */
    private $eventsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsTags", mappedBy="tags")
     */
    private $projectsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgEventsComments", mappedBy="tags")
     */
    private $eventsComments;
}