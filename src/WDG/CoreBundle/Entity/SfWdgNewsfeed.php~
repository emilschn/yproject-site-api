<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgNewsfeed
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $newsfeedContent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $newsfeedDate;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgUsers", inversedBy="newsfeed")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", unique=true)
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
     * Set newsfeedContent
     *
     * @param string $newsfeedContent
     * @return SfWdgNewsfeed
     */
    public function setNewsfeedContent($newsfeedContent)
    {
        $this->newsfeedContent = $newsfeedContent;

        return $this;
    }

    /**
     * Get newsfeedContent
     *
     * @return string 
     */
    public function getNewsfeedContent()
    {
        return $this->newsfeedContent;
    }

    /**
     * Set newsfeedDate
     *
     * @param \DateTime $newsfeedDate
     * @return SfWdgNewsfeed
     */
    public function setNewsfeedDate($newsfeedDate)
    {
        $this->newsfeedDate = $newsfeedDate;

        return $this;
    }

    /**
     * Get newsfeedDate
     *
     * @return \DateTime 
     */
    public function getNewsfeedDate()
    {
        return $this->newsfeedDate;
    }

    /**
     * Set users
     *
     * @param \WDG\CoreBundle\Entity\SfWdgUsers $users
     * @return SfWdgNewsfeed
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
