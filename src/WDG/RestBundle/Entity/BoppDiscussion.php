<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\BoppDiscussion
 *
 * @ORM\Entity(repositoryClass="BoppDiscussionRepository")
 * @ORM\Table(name="bopp_discussion", indexes={@ORM\Index(name="fk_bopp_discussion_bopp_project1_idx", columns={"bopp_project_id"}), @ORM\Index(name="fk_bopp_discussion_bopp_user1_idx", columns={"bopp_user_id"})})
 */
class BoppDiscussion
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
    protected $discussion_title;

    /**
     * @ORM\Column(type="text")
     */
    protected $discussion_content;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $discussion_privacy;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $discussion_type;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $discussion_date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bopp_project_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bopp_user_id;

    /**
     * @ORM\ManyToOne(targetEntity="BoppProject", inversedBy="boppDiscussions")
     * @ORM\JoinColumn(name="bopp_project_id", referencedColumnName="id")
     */
    protected $boppProject;

    /**
     * @ORM\OneToOne(targetEntity="BoppUser", inversedBy="boppDiscussion")
     * @ORM\JoinColumn(name="bopp_user_id", referencedColumnName="id")
     */
    protected $boppUser;

    /**
     * @ORM\ManyToMany(targetEntity="BoppComment", inversedBy="boppDiscussions")
     * @ORM\JoinTable(name="bopp_discussion_comment",
     *     joinColumns={@ORM\JoinColumn(name="bopp_discussion_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="bopp_comment_id", referencedColumnName="id")}
     * )
     */
    protected $boppComments;

    /**
     * @ORM\ManyToMany(targetEntity="BoppTag", mappedBy="boppDiscussions")
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
     * @return \Entity\BoppDiscussion
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
     * Set the value of discussion_title.
     *
     * @param string $discussion_title
     * @return \Entity\BoppDiscussion
     */
    public function setDiscussionTitle($discussion_title)
    {
        $this->discussion_title = $discussion_title;

        return $this;
    }

    /**
     * Get the value of discussion_title.
     *
     * @return string
     */
    public function getDiscussionTitle()
    {
        return $this->discussion_title;
    }

    /**
     * Set the value of discussion_content.
     *
     * @param string $discussion_content
     * @return \Entity\BoppDiscussion
     */
    public function setDiscussionContent($discussion_content)
    {
        $this->discussion_content = $discussion_content;

        return $this;
    }

    /**
     * Get the value of discussion_content.
     *
     * @return string
     */
    public function getDiscussionContent()
    {
        return $this->discussion_content;
    }

    /**
     * Set the value of discussion_privacy.
     *
     * @param integer $discussion_privacy
     * @return \Entity\BoppDiscussion
     */
    public function setDiscussionPrivacy($discussion_privacy)
    {
        $this->discussion_privacy = $discussion_privacy;

        return $this;
    }

    /**
     * Get the value of discussion_privacy.
     *
     * @return integer
     */
    public function getDiscussionPrivacy()
    {
        return $this->discussion_privacy;
    }

    /**
     * Set the value of discussion_type.
     *
     * @param integer $discussion_type
     * @return \Entity\BoppDiscussion
     */
    public function setDiscussionType($discussion_type)
    {
        $this->discussion_type = $discussion_type;

        return $this;
    }

    /**
     * Get the value of discussion_type.
     *
     * @return integer
     */
    public function getDiscussionType()
    {
        return $this->discussion_type;
    }

    /**
     * Set the value of discussion_date.
     *
     * @param datetime $discussion_date
     * @return \Entity\BoppDiscussion
     */
    public function setDiscussionDate($discussion_date)
    {
        $this->discussion_date = $discussion_date;

        return $this;
    }

    /**
     * Get the value of discussion_date.
     *
     * @return datetime
     */
    public function getDiscussionDate()
    {
        return $this->discussion_date;
    }

    /**
     * Set the value of bopp_project_id.
     *
     * @param integer $bopp_project_id
     * @return \Entity\BoppDiscussion
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
     * Set the value of bopp_user_id.
     *
     * @param integer $bopp_user_id
     * @return \Entity\BoppDiscussion
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
     * Set BoppProject entity (many to one).
     *
     * @param \Entity\BoppProject $boppProject
     * @return \Entity\BoppDiscussion
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
     * Set BoppUser entity (one to one).
     *
     * @param \Entity\BoppUser $boppUser
     * @return \Entity\BoppDiscussion
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
     * Add BoppComment entity to collection.
     *
     * @param \Entity\BoppComment $boppComment
     * @return \Entity\BoppDiscussion
     */
    public function addBoppComment(BoppComment $boppComment)
    {
        $boppComment->addBoppDiscussion($this);
        $this->boppComments[] = $boppComment;

        return $this;
    }

    /**
     * Remove BoppComment entity from collection.
     *
     * @param \Entity\BoppComment $boppComment
     * @return \Entity\BoppDiscussion
     */
    public function removeBoppComment(BoppComment $boppComment)
    {
        $boppComment->removeBoppDiscussion($this);
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
     * @return \Entity\BoppDiscussion
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
     * @return \Entity\BoppDiscussion
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
        return array('id', 'discussion_title', 'discussion_content', 'discussion_privacy', 'discussion_type', 'discussion_date', 'bopp_project_id', 'bopp_user_id');
    }
}