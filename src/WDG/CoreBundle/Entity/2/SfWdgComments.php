<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgComments
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
    private $commentContent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $commentDate;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgUsers", inversedBy="comments")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", unique=true)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsComments", mappedBy="comments")
     */
    private $projectsComments;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgEventsComments", mappedBy="comments")
     */
    private $eventsComments;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgDiscussionsComments", mappedBy="comments")
     */
    private $discussionsComments;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgNewsComments", mappedBy="comments")
     */
    private $newsComments;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgTasksComments", mappedBy="comments")
     */
    private $tasksComments;
}