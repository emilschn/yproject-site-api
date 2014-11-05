<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgEvents
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
    private $eventName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $eventDescription;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $eventBegining;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $eventEnding;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $eventPrivacy;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgProjects", inversedBy="events")
     * @ORM\JoinColumn(name="sfWdgProjectsId", referencedColumnName="id", unique=true)
     */
    private $projects;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgUsers", inversedBy="events")
     * @ORM\JoinColumn(name="sfWdgUsersId", referencedColumnName="id", unique=true)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgEventsTags", mappedBy="events")
     */
    private $eventsTags;
}