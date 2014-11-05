<?php
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
     * @ORM\Column(type="string", length=100, nullable=true)
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
     * @ORM\OneToMany(targetEntity="SfWfgProjectsUsers", mappedBy="users")
     */
    private $projectsUsers;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgTasksUsersAssigned", mappedBy="users")
     */
    private $tasksUsersAssigned;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgOrganisationsMembers", mappedBy="users")
     */
    private $organisationsMembers;
}