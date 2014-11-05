<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgNewsComments
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgComments", inversedBy="newsComments")
     * @ORM\JoinColumn(name="sfWdgCommentsId", referencedColumnName="id", nullable=false)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgNews", inversedBy="newsComments")
     * @ORM\JoinColumn(name="sfWdgNewsId", referencedColumnName="id", nullable=false)
     */
    private $news;
}