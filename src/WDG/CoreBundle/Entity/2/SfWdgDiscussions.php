<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgDiscussions
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $discussionTitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $discussionContent;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $discussionPrivacy;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $discussionType;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgProjects", inversedBy="discussions")
     * @ORM\JoinColumn(name="sfWdgProjectsId", referencedColumnName="id", unique=true)
     */
    private $projects;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgUsers", inversedBy="discussions")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", unique=true)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="sfWdgDiscussionsTags", mappedBy="discussions")
     */
    private $discussionsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgDiscussionsComments", mappedBy="discussions")
     */
    private $discussionsComments;
}