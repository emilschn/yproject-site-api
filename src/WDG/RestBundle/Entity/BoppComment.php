<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\BoppComment
 *
 * @ORM\Entity(repositoryClass="BoppCommentRepository")
 * @ORM\Table(name="bopp_comment", indexes={@ORM\Index(name="fk_bopp_comment_bopp_user1_idx", columns={"bopp_user_id"})})
 */
class BoppComment
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
    protected $comment_content;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $comment_date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bopp_user_id;

    /**
     * @ORM\OneToOne(targetEntity="BoppUser", inversedBy="boppComment")
     * @ORM\JoinColumn(name="bopp_user_id", referencedColumnName="id")
     */
    protected $boppUser;

    /**
     * @ORM\ManyToMany(targetEntity="BoppDiscussion", mappedBy="boppComments")
     */
    protected $boppDiscussions;

    /**
     * @ORM\ManyToMany(targetEntity="BoppEvent", mappedBy="boppComments")
     */
    protected $boppEvents;

    /**
     * @ORM\ManyToMany(targetEntity="BoppNews", inversedBy="boppComments")
     * @ORM\JoinTable(name="bopp_news_comment",
     *     joinColumns={@ORM\JoinColumn(name="bopp_comment_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="bopp_news_id", referencedColumnName="id")}
     * )
     */
    protected $boppNews;

    /**
     * @ORM\ManyToMany(targetEntity="BoppTask", inversedBy="boppComments")
     * @ORM\JoinTable(name="bopp_tasks_comment",
     *     joinColumns={@ORM\JoinColumn(name="bopp_comment_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="bopp_tasks_id", referencedColumnName="id")}
     * )
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
     * @return \Entity\BoppComment
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
     * Set the value of comment_content.
     *
     * @param string $comment_content
     * @return \Entity\BoppComment
     */
    public function setCommentContent($comment_content)
    {
        $this->comment_content = $comment_content;

        return $this;
    }

    /**
     * Get the value of comment_content.
     *
     * @return string
     */
    public function getCommentContent()
    {
        return $this->comment_content;
    }

    /**
     * Set the value of comment_date.
     *
     * @param string $comment_date
     * @return \Entity\BoppComment
     */
    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;

        return $this;
    }

    /**
     * Get the value of comment_date.
     *
     * @return string
     */
    public function getCommentDate()
    {
        return $this->comment_date;
    }

    /**
     * Set the value of bopp_user_id.
     *
     * @param integer $bopp_user_id
     * @return \Entity\BoppComment
     */
    public function setBoppUserId($bopp_user_id)
    {
        $this->bopp_user_id = $bopp_user_id;

        return $this;
    }

    /**
     * Get the value of bopp_user_id.
     *
     * @return integer
     */
    public function getBoppUserId()
    {
        return $this->bopp_user_id;
    }

    /**
     * Set BoppUser entity (one to one).
     *
     * @param \Entity\BoppUser $boppUser
     * @return \Entity\BoppComment
     */
    public function setBoppUser(BoppUser $boppUser)
    {
        $this->boppUser = $boppUser;

        return $this;
    }

    /**
     * Get BoppUser entity (one to one).
     *
     * @return \Entity\BoppUser
     */
    public function getBoppUser()
    {
        return $this->boppUser;
    }

    /**
     * Add BoppDiscussion entity to collection.
     *
     * @param \Entity\BoppDiscussion $boppDiscussion
     * @return \Entity\BoppComment
     */
    public function addBoppDiscussion(BoppDiscussion $boppDiscussion)
    {
        $this->boppDiscussions[] = $boppDiscussion;

        return $this;
    }

    /**
     * Remove BoppDiscussion entity from collection.
     *
     * @param \Entity\BoppDiscussion $boppDiscussion
     * @return \Entity\BoppComment
     */
    public function removeBoppDiscussion(BoppDiscussion $boppDiscussion)
    {
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
     * @return \Entity\BoppComment
     */
    public function addBoppEvent(BoppEvent $boppEvent)
    {
        $this->boppEvents[] = $boppEvent;

        return $this;
    }

    /**
     * Remove BoppEvent entity from collection.
     *
     * @param \Entity\BoppEvent $boppEvent
     * @return \Entity\BoppComment
     */
    public function removeBoppEvent(BoppEvent $boppEvent)
    {
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
     * @return \Entity\BoppComment
     */
    public function addBoppNews(BoppNews $boppNews)
    {
        $boppNews->addBoppComment($this);
        $this->boppNews[] = $boppNews;

        return $this;
    }

    /**
     * Remove BoppNews entity from collection.
     *
     * @param \Entity\BoppNews $boppNews
     * @return \Entity\BoppComment
     */
    public function removeBoppNews(BoppNews $boppNews)
    {
        $boppNews->removeBoppComment($this);
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
     * @return \Entity\BoppComment
     */
    public function addBoppTask(BoppTask $boppTask)
    {
        $boppTask->addBoppComment($this);
        $this->boppTasks[] = $boppTask;

        return $this;
    }

    /**
     * Remove BoppTask entity from collection.
     *
     * @param \Entity\BoppTask $boppTask
     * @return \Entity\BoppComment
     */
    public function removeBoppTask(BoppTask $boppTask)
    {
        $boppTask->removeBoppComment($this);
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
        return array('id', 'comment_content', 'comment_date', 'bopp_user_id');
    }
}