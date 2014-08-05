<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgFollow
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $followingId;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgUsers", inversedBy="follow")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id")
     */
    private $users;

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
     * Set followingId
     *
     * @param integer $followingId
     * @return SfWdgFollow
     */
    public function setFollowingId($followingId)
    {
        $this->followingId = $followingId;

        return $this;
    }

    /**
     * Get followingId
     *
     * @return integer 
     */
    public function getFollowingId()
    {
        return $this->followingId;
    }

    /**
     * Set users
     *
     * @param \WDG\CoreBundle\Entity\SfWdgUsers $users
     * @return SfWdgFollow
     */
    public function setUsers(\WDG\CoreBundle\Entity\SfWdgUsers $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \WDG\CoreBundle\Entity\SfWdgUsers 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
