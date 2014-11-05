<?php
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgNewsTags
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgNews", inversedBy="newsTags")
     * @ORM\JoinColumn(name="sfWdgNewsId", referencedColumnName="id", nullable=false)
     */
    private $news;

    /**
     * @ORM\ManyToOne(targetEntity="SfWdgTags", inversedBy="newsTags")
     * @ORM\JoinColumn(name="sfWdgTagsId", referencedColumnName="id", nullable=false)
     */
    private $tags;
}