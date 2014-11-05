<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\BoppNews
 *
 * @ORM\Entity(repositoryClass="BoppNewsRepository")
 * @ORM\Table(name="bopp_news", indexes={@ORM\Index(name="fk_bopp_news_bopp_user1_idx", columns={"bopp_user_id"}), @ORM\Index(name="fk_bopp_news_bopp_project1_idx", columns={"bopp_project_id"})})
 */
class BoppNews
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $news_title;

    /**
     * @ORM\Column(type="text")
     */
    protected $news_content;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $news_date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bopp_user_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bopp_project_id;

    /**
     * @ORM\OneToOne(targetEntity="BoppUser", inversedBy="boppNews")
     * @ORM\JoinColumn(name="bopp_user_id", referencedColumnName="id")
     */
    protected $boppUser;

    /**
     * @ORM\ManyToOne(targetEntity="BoppProject", inversedBy="boppNews")
     * @ORM\JoinColumn(name="bopp_project_id", referencedColumnName="id")
     */
    protected $boppProject;

    /**
     * @ORM\ManyToMany(targetEntity="BoppComment", mappedBy="boppNews")
     */
    protected $boppComments;

    /**
     * @ORM\ManyToMany(targetEntity="BoppTag", mappedBy="boppNews")
     */
    protected $boppTags;

    public function __construct()
    {
        $this->boppComments = new ArrayCollection();
        $this->boppTags = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\BoppNews
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
     * Set the value of news_title.
     *
     * @param string $news_title
     * @return \Entity\BoppNews
     */
    public function setNewsTitle($news_title)
    {
        $this->news_title = $news_title;

        return $this;
    }

    /**
     * Get the value of news_title.
     *
     * @return string
     */
    public function getNewsTitle()
    {
        return $this->news_title;
    }

    /**
     * Set the value of news_content.
     *
     * @param string $news_content
     * @return \Entity\BoppNews
     */
    public function setNewsContent($news_content)
    {
        $this->news_content = $news_content;

        return $this;
    }

    /**
     * Get the value of news_content.
     *
     * @return string
     */
    public function getNewsContent()
    {
        return $this->news_content;
    }

    /**
     * Set the value of news_date.
     *
     * @param datetime $news_date
     * @return \Entity\BoppNews
     */
    public function setNewsDate($news_date)
    {
        $this->news_date = $news_date;

        return $this;
    }

    /**
     * Get the value of news_date.
     *
     * @return datetime
     */
    public function getNewsDate()
    {
        return $this->news_date;
    }

    /**
     * Set the value of bopp_user_id.
     *
     * @param integer $bopp_user_id
     * @return \Entity\BoppNews
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
     * Set the value of bopp_project_id.
     *
     * @param integer $bopp_project_id
     * @return \Entity\BoppNews
     */
    public function setBoppProjectId($bopp_project_id)
    {
        $this->bopp_project_id = $bopp_project_id;

        return $this;
    }

    /**
     * Get the value of bopp_project_id.
     *
     * @return integer
     */
    public function getBoppProjectId()
    {
        return $this->bopp_project_id;
    }

    /**
     * Set BoppUser entity (one to one).
     *
     * @param \Entity\BoppUser $boppUser
     * @return \Entity\BoppNews
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
     * Set BoppProject entity (many to one).
     *
     * @param \Entity\BoppProject $boppProject
     * @return \Entity\BoppNews
     */
    public function setBoppProject(BoppProject $boppProject = null)
    {
        $this->boppProject = $boppProject;

        return $this;
    }

    /**
     * Get BoppProject entity (many to one).
     *
     * @return \Entity\BoppProject
     */
    public function getBoppProject()
    {
        return $this->boppProject;
    }

    /**
     * Add BoppComment entity to collection.
     *
     * @param \Entity\BoppComment $boppComment
     * @return \Entity\BoppNews
     */
    public function addBoppComment(BoppComment $boppComment)
    {
        $this->boppComments[] = $boppComment;

        return $this;
    }

    /**
     * Remove BoppComment entity from collection.
     *
     * @param \Entity\BoppComment $boppComment
     * @return \Entity\BoppNews
     */
    public function removeBoppComment(BoppComment $boppComment)
    {
        $this->boppComments->removeElement($boppComment);

        return $this;
    }

    /**
     * Get BoppComment entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppComments()
    {
        return $this->boppComments;
    }

    /**
     * Add BoppTag entity to collection.
     *
     * @param \Entity\BoppTag $boppTag
     * @return \Entity\BoppNews
     */
    public function addBoppTag(BoppTag $boppTag)
    {
        $this->boppTags[] = $boppTag;

        return $this;
    }

    /**
     * Remove BoppTag entity from collection.
     *
     * @param \Entity\BoppTag $boppTag
     * @return \Entity\BoppNews
     */
    public function removeBoppTag(BoppTag $boppTag)
    {
        $this->boppTags->removeElement($boppTag);

        return $this;
    }

    /**
     * Get BoppTag entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppTags()
    {
        return $this->boppTags;
    }

    public function __sleep()
    {
        return array('id', 'news_title', 'news_content', 'news_date', 'bopp_user_id', 'bopp_project_id');
    }
}