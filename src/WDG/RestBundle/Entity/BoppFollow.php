<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\BoppFollow
 *
 * @ORM\Entity(repositoryClass="BoppFollowRepository")
 * @ORM\Table(name="bopp_follow", indexes={@ORM\Index(name="fk_bopp_follow_bopp_user1_idx", columns={"bopp_user_id"})})
 */
class BoppFollow
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $follow_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bopp_user_id;

    /**
     * @ORM\ManyToOne(targetEntity="BoppUser", inversedBy="boppFollows")
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
     * @return \Entity\BoppFollow
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
     * Set the value of follow_id.
     *
     * @param string $follow_id
     * @return \Entity\BoppFollow
     */
    public function setFollowId($follow_id)
    {
        $this->follow_id = $follow_id;

        return $this;
    }

    /**
     * Get the value of follow_id.
     *
     * @return string
     */
    public function getFollowId()
    {
        return $this->follow_id;
    }

    /**
     * Set the value of bopp_user_id.
     *
     * @param integer $bopp_user_id
     * @return \Entity\BoppFollow
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
     * @return \Entity\BoppFollow
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
        return array('id', 'follow_id', 'bopp_user_id');
    }
}