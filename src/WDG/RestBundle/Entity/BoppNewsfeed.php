<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\BoppNewsfeed
 *
 * @ORM\Entity(repositoryClass="BoppNewsfeedRepository")
 * @ORM\Table(name="bopp_newsfeed", indexes={@ORM\Index(name="fk_bopp_newsfeed_bopp_user1_idx", columns={"bopp_user_id"})})
 */
class BoppNewsfeed
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $newsfeed_content;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $newsfeed_date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bopp_user_id;

    /**
     * @ORM\ManyToOne(targetEntity="BoppUser", inversedBy="boppNewsfeeds")
     * @ORM\JoinColumn(name="bopp_user_id", referencedColumnName="id")
     */
    protected $boppUser;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\BoppNewsfeed
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
     * Set the value of newsfeed_content.
     *
     * @param string $newsfeed_content
     * @return \Entity\BoppNewsfeed
     */
    public function setNewsfeedContent($newsfeed_content)
    {
        $this->newsfeed_content = $newsfeed_content;

        return $this;
    }

    /**
     * Get the value of newsfeed_content.
     *
     * @return string
     */
    public function getNewsfeedContent()
    {
        return $this->newsfeed_content;
    }

    /**
     * Set the value of newsfeed_date.
     *
     * @param datetime $newsfeed_date
     * @return \Entity\BoppNewsfeed
     */
    public function setNewsfeedDate($newsfeed_date)
    {
        $this->newsfeed_date = $newsfeed_date;

        return $this;
    }

    /**
     * Get the value of newsfeed_date.
     *
     * @return datetime
     */
    public function getNewsfeedDate()
    {
        return $this->newsfeed_date;
    }

    /**
     * Set the value of bopp_user_id.
     *
     * @param integer $bopp_user_id
     * @return \Entity\BoppNewsfeed
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
     * Set BoppUser entity (many to one).
     *
     * @param \Entity\BoppUser $boppUser
     * @return \Entity\BoppNewsfeed
     */
    public function setBoppUser(BoppUser $boppUser = null)
    {
        $this->boppUser = $boppUser;

        return $this;
    }

    /**
     * Get BoppUser entity (many to one).
     *
     * @return \Entity\BoppUser
     */
    public function getBoppUser()
    {
        return $this->boppUser;
    }

    public function __sleep()
    {
        return array('id', 'newsfeed_content', 'newsfeed_date', 'bopp_user_id');
    }
}