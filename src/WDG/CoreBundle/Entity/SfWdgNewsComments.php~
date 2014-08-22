<?php
namespace WDG\CoreBundle\Entity;
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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgComments $comments
     * @return SfWdgNewsComments
     */
    public function setComments(\WDG\CoreBundle\Entity\SfWdgComments $comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return \WDG\CoreBundle\Entity\SfWdgComments 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set news
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNews $news
     * @return SfWdgNewsComments
     */
    public function setNews(\WDG\CoreBundle\Entity\SfWdgNews $news)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return \WDG\CoreBundle\Entity\SfWdgNews 
     */
    public function getNews()
    {
        return $this->news;
    }
}
