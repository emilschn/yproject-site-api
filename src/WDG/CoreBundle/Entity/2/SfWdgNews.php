<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgNews
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
    private $newsTitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $newsContent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $newsDate;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgProjects", inversedBy="news")
     * @ORM\JoinColumn(name="sfWdgProjectsId", referencedColumnName="id", unique=true)
     */
    private $projects;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgUsers", inversedBy="news")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", unique=true)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgNewsTags", mappedBy="news")
     */
    private $newsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgNewsComments", mappedBy="news")
     */
    private $newsComments;
}