<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgProjects
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
    private $wpProjectId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $projectName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectDescription;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgTasks", inversedBy="projects")
     * @ORM\JoinColumn(name="sfWdgTasksId", referencedColumnName="id", unique=true)
     */
    private $tasks;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgOrganisations", inversedBy="projects")
     * @ORM\JoinColumn(name="sfWdgOrganisationsId", referencedColumnName="id", unique=true)
     */
    private $organisations;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgEvents", mappedBy="projects")
     */
    private $events;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgNews", mappedBy="projects")
     */
    private $news;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgDiscussions", mappedBy="projects")
     */
    private $discussions;

    /**
     * @ORM\OneToMany(targetEntity="SfWfgProjectsUsers", mappedBy="projects")
     */
    private $projectsUsers;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsTags", mappedBy="projects")
     */
    private $projectsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsComments", mappedBy="projects")
     */
    private $projectsComments;
}