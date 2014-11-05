<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgEventsTags
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgEvents", inversedBy="eventsTags")
     * @ORM\JoinColumn(name="sfWdgEventsId", referencedColumnName="id", nullable=false)
     */
    private $events;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgTags", inversedBy="eventsTags")
     * @ORM\JoinColumn(name="sfWdgTagsId", referencedColumnName="id", nullable=false)
     */
    private $tags;
}