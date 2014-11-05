<?php
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
}