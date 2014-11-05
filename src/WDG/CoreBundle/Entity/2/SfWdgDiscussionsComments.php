<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgDiscussionsComments
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgComments", inversedBy="discussionsComments")
     * @ORM\JoinColumn(name="sfWdgCommentsId", referencedColumnName="id", nullable=false)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgDiscussions", inversedBy="discussionsComments")
     * @ORM\JoinColumn(name="sfWdgDiscussionsId", referencedColumnName="id", nullable=false)
     */
    private $discussions;
}