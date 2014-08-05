<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgUsers
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", unique=true, nullable=true)
     */
    private $wpUserId;

    /**
     * @ORM\Column(type="integer", length=100, nullable=true)
     */
    private $userGender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userSurname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userUsername;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $userBirthdayDate;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $userBirthdayCity;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $userAddress;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $userPostalCode;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $userCity;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $userEmail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userLinkedinUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userTwitterUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userViadeoUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userPictureUrl;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $userSignupDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userActivationKey;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $userPassword;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgTasks", mappedBy="users")
     */
    private $tasks;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgComments", mappedBy="users")
     */
    private $comments;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgEvents", mappedBy="users")
     */
    private $events;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgNews", mappedBy="users")
     */
    private $news;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgDiscussions", mappedBy="users")
     */
    private $discussions;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgNewsfeed", mappedBy="users")
     */
    private $newsfeed;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgFollow", mappedBy="users")
     */
    private $follow;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsUsers", mappedBy="users")
     */
    private $projectsUsers;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgTasksUsersAssigned", mappedBy="users")
     */
    private $tasksUsersAssigned;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->follow = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projectsUsers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tasksUsersAssigned = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set wpUserId
     *
     * @param integer $wpUserId
     * @return SfWdgUsers
     */
    public function setWpUserId($wpUserId)
    {
        $this->wpUserId = $wpUserId;

        return $this;
    }

    /**
     * Get wpUserId
     *
     * @return integer 
     */
    public function getWpUserId()
    {
        return $this->wpUserId;
    }

    /**
     * Set userGender
     *
     * @param string $userGender
     * @return SfWdgUsers
     */
    public function setUserGender($userGender)
    {
        $this->userGender = $userGender;

        return $this;
    }

    /**
     * Get userGender
     *
     * @return string 
     */
    public function getUserGender()
    {
        return $this->userGender;
    }

    /**
     * Set userName
     *
     * @param string $userName
     * @return SfWdgUsers
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userSurname
     *
     * @param string $userSurname
     * @return SfWdgUsers
     */
    public function setUserSurname($userSurname)
    {
        $this->userSurname = $userSurname;

        return $this;
    }

    /**
     * Get userSurname
     *
     * @return string 
     */
    public function getUserSurname()
    {
        return $this->userSurname;
    }

    /**
     * Set userUsername
     *
     * @param string $userUsername
     * @return SfWdgUsers
     */
    public function setUserUsername($userUsername)
    {
        $this->userUsername = $userUsername;

        return $this;
    }

    /**
     * Get userUsername
     *
     * @return string 
     */
    public function getUserUsername()
    {
        return $this->userUsername;
    }

    /**
     * Set userBirthdayDate
     *
     * @param \DateTime $userBirthdayDate
     * @return SfWdgUsers
     */
    public function setUserBirthdayDate($userBirthdayDate)
    {
        $this->userBirthdayDate = $userBirthdayDate;

        return $this;
    }

    /**
     * Get userBirthdayDate
     *
     * @return \DateTime 
     */
    public function getUserBirthdayDate()
    {
        return $this->userBirthdayDate;
    }

    /**
     * Set userBirthdayCity
     *
     * @param string $userBirthdayCity
     * @return SfWdgUsers
     */
    public function setUserBirthdayCity($userBirthdayCity)
    {
        $this->userBirthdayCity = $userBirthdayCity;

        return $this;
    }

    /**
     * Get userBirthdayCity
     *
     * @return string 
     */
    public function getUserBirthdayCity()
    {
        return $this->userBirthdayCity;
    }

    /**
     * Set userAddress
     *
     * @param string $userAddress
     * @return SfWdgUsers
     */
    public function setUserAddress($userAddress)
    {
        $this->userAddress = $userAddress;

        return $this;
    }

    /**
     * Get userAddress
     *
     * @return string 
     */
    public function getUserAddress()
    {
        return $this->userAddress;
    }

    /**
     * Set userPostalCode
     *
     * @param string $userPostalCode
     * @return SfWdgUsers
     */
    public function setUserPostalCode($userPostalCode)
    {
        $this->userPostalCode = $userPostalCode;

        return $this;
    }

    /**
     * Get userPostalCode
     *
     * @return string 
     */
    public function getUserPostalCode()
    {
        return $this->userPostalCode;
    }

    /**
     * Set userCity
     *
     * @param string $userCity
     * @return SfWdgUsers
     */
    public function setUserCity($userCity)
    {
        $this->userCity = $userCity;

        return $this;
    }

    /**
     * Get userCity
     *
     * @return string 
     */
    public function getUserCity()
    {
        return $this->userCity;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     * @return SfWdgUsers
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string 
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set userLinkedinUrl
     *
     * @param string $userLinkedinUrl
     * @return SfWdgUsers
     */
    public function setUserLinkedinUrl($userLinkedinUrl)
    {
        $this->userLinkedinUrl = $userLinkedinUrl;

        return $this;
    }

    /**
     * Get userLinkedinUrl
     *
     * @return string 
     */
    public function getUserLinkedinUrl()
    {
        return $this->userLinkedinUrl;
    }

    /**
     * Set userTwitterUrl
     *
     * @param string $userTwitterUrl
     * @return SfWdgUsers
     */
    public function setUserTwitterUrl($userTwitterUrl)
    {
        $this->userTwitterUrl = $userTwitterUrl;

        return $this;
    }

    /**
     * Get userTwitterUrl
     *
     * @return string 
     */
    public function getUserTwitterUrl()
    {
        return $this->userTwitterUrl;
    }

    /**
     * Set userViadeoUrl
     *
     * @param string $userViadeoUrl
     * @return SfWdgUsers
     */
    public function setUserViadeoUrl($userViadeoUrl)
    {
        $this->userViadeoUrl = $userViadeoUrl;

        return $this;
    }

    /**
     * Get userViadeoUrl
     *
     * @return string 
     */
    public function getUserViadeoUrl()
    {
        return $this->userViadeoUrl;
    }

    /**
     * Set userPictureUrl
     *
     * @param string $userPictureUrl
     * @return SfWdgUsers
     */
    public function setUserPictureUrl($userPictureUrl)
    {
        $this->userPictureUrl = $userPictureUrl;

        return $this;
    }

    /**
     * Get userPictureUrl
     *
     * @return string 
     */
    public function getUserPictureUrl()
    {
        return $this->userPictureUrl;
    }

    /**
     * Set userSignupDate
     *
     * @param \DateTime $userSignupDate
     * @return SfWdgUsers
     */
    public function setUserSignupDate($userSignupDate)
    {
        $this->userSignupDate = $userSignupDate;

        return $this;
    }

    /**
     * Get userSignupDate
     *
     * @return \DateTime 
     */
    public function getUserSignupDate()
    {
        return $this->userSignupDate;
    }

    /**
     * Set userActivationKey
     *
     * @param string $userActivationKey
     * @return SfWdgUsers
     */
    public function setUserActivationKey($userActivationKey)
    {
        $this->userActivationKey = $userActivationKey;

        return $this;
    }

    /**
     * Get userActivationKey
     *
     * @return string 
     */
    public function getUserActivationKey()
    {
        return $this->userActivationKey;
    }

    /**
     * Set userPassword
     *
     * @param string $userPassword
     * @return SfWdgUsers
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;

        return $this;
    }

    /**
     * Get userPassword
     *
     * @return string 
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * Set tasks
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasks $tasks
     * @return SfWdgUsers
     */
    public function setTasks(\WDG\CoreBundle\Entity\SfWdgTasks $tasks = null)
    {
        $this->tasks = $tasks;

        return $this;
    }

    /**
     * Get tasks
     *
     * @return \WDG\CoreBundle\Entity\SfWdgTasks 
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Set comments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgComments $comments
     * @return SfWdgUsers
     */
    public function setComments(\WDG\CoreBundle\Entity\SfWdgComments $comments = null)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return \WDG\CoreBundle\Entity\SfWdgComments 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set events
     *
     * @param \WDG\CoreBundle\Entity\SfWdgEvents $events
     * @return SfWdgUsers
     */
    public function setEvents(\WDG\CoreBundle\Entity\SfWdgEvents $events = null)
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
     * Set news
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNews $news
     * @return SfWdgUsers
     */
    public function setNews(\WDG\CoreBundle\Entity\SfWdgNews $news = null)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return \WDG\CoreBundle\Entity\SfWdgNews 
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Set discussions
     *
     * @param \WDG\CoreBundle\Entity\SfWdgDiscussions $discussions
     * @return SfWdgUsers
     */
    public function setDiscussions(\WDG\CoreBundle\Entity\SfWdgDiscussions $discussions = null)
    {
        $this->discussions = $discussions;

        return $this;
    }

    /**
     * Get discussions
     *
     * @return \WDG\CoreBundle\Entity\SfWdgDiscussions 
     */
    public function getDiscussions()
    {
        return $this->discussions;
    }

    /**
     * Set newsfeed
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNewsfeed $newsfeed
     * @return SfWdgUsers
     */
    public function setNewsfeed(\WDG\CoreBundle\Entity\SfWdgNewsfeed $newsfeed = null)
    {
        $this->newsfeed = $newsfeed;

        return $this;
    }

    /**
     * Get newsfeed
     *
     * @return \WDG\CoreBundle\Entity\SfWdgNewsfeed 
     */
    public function getNewsfeed()
    {
        return $this->newsfeed;
    }

    /**
     * Add follow
     *
     * @param \WDG\CoreBundle\Entity\SfWdgFollow $follow
     * @return SfWdgUsers
     */
    public function addFollow(\WDG\CoreBundle\Entity\SfWdgFollow $follow)
    {
        $this->follow[] = $follow;

        return $this;
    }

    /**
     * Remove follow
     *
     * @param \WDG\CoreBundle\Entity\SfWdgFollow $follow
     */
    public function removeFollow(\WDG\CoreBundle\Entity\SfWdgFollow $follow)
    {
        $this->follow->removeElement($follow);
    }

    /**
     * Get follow
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFollow()
    {
        return $this->follow;
    }

    /**
     * Add projectsUsers
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers
     * @return SfWdgUsers
     */
    public function addProjectsUser(\WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers)
    {
        $this->projectsUsers[] = $projectsUsers;

        return $this;
    }

    /**
     * Remove projectsUsers
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers
     */
    public function removeProjectsUser(\WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers)
    {
        $this->projectsUsers->removeElement($projectsUsers);
    }

    /**
     * Get projectsUsers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectsUsers()
    {
        return $this->projectsUsers;
    }

    /**
     * Add tasksUsersAssigned
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasksUsersAssigned $tasksUsersAssigned
     * @return SfWdgUsers
     */
    public function addTasksUsersAssigned(\WDG\CoreBundle\Entity\SfWdgTasksUsersAssigned $tasksUsersAssigned)
    {
        $this->tasksUsersAssigned[] = $tasksUsersAssigned;

        return $this;
    }

    /**
     * Remove tasksUsersAssigned
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasksUsersAssigned $tasksUsersAssigned
     */
    public function removeTasksUsersAssigned(\WDG\CoreBundle\Entity\SfWdgTasksUsersAssigned $tasksUsersAssigned)
    {
        $this->tasksUsersAssigned->removeElement($tasksUsersAssigned);
    }

    /**
     * Get tasksUsersAssigned
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasksUsersAssigned()
    {
        return $this->tasksUsersAssigned;
    }

    public function __toString()
    {
        return $this->userName;
    }
}
