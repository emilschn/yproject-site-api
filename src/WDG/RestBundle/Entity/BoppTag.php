<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\BoppTag
 *
 * @ORM\Entity(repositoryClass="BoppTagRepository")
 * @ORM\Table(name="bopp_tag")
 */
class BoppTag
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $tag_name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $tag_type;

    /**
     * @ORM\ManyToMany(targetEntity="BoppDiscussion", inversedBy="boppTags")
     * @ORM\JoinTable(name="bopp_discussion_tag",
     *     joinColumns={@ORM\JoinColumn(name="bopp_tag_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="bopp_discussion_id", referencedColumnName="id")}
     * )
     */
    protected $boppDiscussions;

    /**
     * @ORM\ManyToMany(targetEntity="BoppEvent", inversedBy="boppTags")
     * @ORM\JoinTable(name="bopp_event_has_bopp_tag",
     *     joinColumns={@ORM\JoinColumn(name="bopp_tag_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="bopp_event_id", referencedColumnName="id")}
     * )
     */
    protected $boppEvents;

    /**
     * @ORM\ManyToMany(targetEntity="BoppNews", inversedBy="boppTags")
     * @ORM\JoinTable(name="bopp_news_tag",
     *     joinColumns={@ORM\JoinColumn(name="bopp_tag_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="bopp_news_id", referencedColumnName="id")}
     * )
     */
    protected $boppNews;

    /**
     * @ORM\ManyToMany(targetEntity="BoppTask", mappedBy="boppTags")
     */
    protected $boppTasks;

    public function __construct()
    {
        $this->boppDiscussions = new ArrayCollection();
        $this->boppEvents = new ArrayCollection();
        $this->boppNews = new ArrayCollection();
        $this->boppTasks = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\BoppTag
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of tag_name.
     *
     * @param string $tag_name
     * @return \Entity\BoppTag
     */
    public function setTagName($tag_name)
    {
        $this->tag_name = $tag_name;

        return $this;
    }

    /**
     * Get the value of tag_name.
     *
     * @return string
     */
    public function getTagName()
    {
        return $this->tag_name;
    }

    /**
     * Set the value of tag_type.
     *
     * @param integer $tag_type
     * @return \Entity\BoppTag
     */
    public function setTagType($tag_type)
    {
        $this->tag_type = $tag_type;

        return $this;
    }

    /**
     * Get the value of tag_type.
     *
     * @return integer
     */
    public function getTagType()
    {
        return $this->tag_type;
    }

    /**
     * Add BoppDiscussion entity to collection.
     *
     * @param \Entity\BoppDiscussion $boppDiscussion
     * @return \Entity\BoppTag
     */
    public function addBoppDiscussion(BoppDiscussion $boppDiscussion)
    {
        $boppDiscussion->addBoppTag($this);
        $this->boppDiscussions[] = $boppDiscussion;

        return $this;
    }

    /**
     * Remove BoppDiscussion entity from collection.
     *
     * @param \Entity\BoppDiscussion $boppDiscussion
     * @return \Entity\BoppTag
     */
    public function removeBoppDiscussion(BoppDiscussion $boppDiscussion)
    {
        $boppDiscussion->removeBoppTag($this);
        $this->boppDiscussions->removeElement($boppDiscussion);

        return $this;
    }

    /**
     * Get BoppDiscussion entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppDiscussions()
    {
        return $this->boppDiscussions;
    }

    /**
     * Add BoppEvent entity to collection.
     *
     * @param \Entity\BoppEvent $boppEvent
     * @return \Entity\BoppTag
     */
    public function addBoppEvent(BoppEvent $boppEvent)
    {
        $boppEvent->addBoppTag($this);
        $this->boppEvents[] = $boppEvent;

        return $this;
    }

    /**
     * Remove BoppEvent entity from collection.
     *
     * @param \Entity\BoppEvent $boppEvent
     * @return \Entity\BoppTag
     */
    public function removeBoppEvent(BoppEvent $boppEvent)
    {
        $boppEvent->removeBoppTag($this);
        $this->boppEvents->removeElement($boppEvent);

        return $this;
    }

    /**
     * Get BoppEvent entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppEvents()
    {
        return $this->boppEvents;
    }

    /**
     * Add BoppNews entity to collection.
     *
     * @param \Entity\BoppNews $boppNews
     * @return \Entity\BoppTag
     */
    public function addBoppNews(BoppNews $boppNews)
    {
        $boppNews->addBoppTag($this);
        $this->boppNews[] = $boppNews;

        return $this;
    }

    /**
     * Remove BoppNews entity from collection.
     *
     * @param \Entity\BoppNews $boppNews
     * @return \Entity\BoppTag
     */
    public function removeBoppNews(BoppNews $boppNews)
    {
        $boppNews->removeBoppTag($this);
        $this->boppNews->removeElement($boppNews);

        return $this;
    }

    /**
     * Get BoppNews entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppNews()
    {
        return $this->boppNews;
    }

    /**
     * Add BoppTask entity to collection.
     *
     * @param \Entity\BoppTask $boppTask
     * @return \Entity\BoppTag
     */
    public function addBoppTask(BoppTask $boppTask)
    {
        $this->boppTasks[] = $boppTask;

        return $this;
    }

    /**
     * Remove BoppTask entity from collection.
     *
     * @param \Entity\BoppTask $boppTask
     * @return \Entity\BoppTag
     */
    public function removeBoppTask(BoppTask $boppTask)
    {
        $this->boppTasks->removeElement($boppTask);

        return $this;
    }

    /**
     * Get BoppTask entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppTasks()
    {
        return $this->boppTasks;
    }

    public function __sleep()
    {
        return array('id', 'tag_name', 'tag_type');
    }
}