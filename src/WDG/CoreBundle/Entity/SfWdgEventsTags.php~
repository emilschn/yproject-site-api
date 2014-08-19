<?php
namespace WDG\CoreBundle\Entity;
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
     * Set events
     *
     * @param \WDG\CoreBundle\Entity\SfWdgEvents $events
     * @return SfWdgEventsTags
     */
    public function setEvents(\WDG\CoreBundle\Entity\SfWdgEvents $events)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * Get events
     *
     * @return \WDG\CoreBundle\Entity\SfWdgEvents 
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set tags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTags $tags
     * @return SfWdgEventsTags
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
