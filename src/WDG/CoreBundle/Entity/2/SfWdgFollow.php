<?php
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
}