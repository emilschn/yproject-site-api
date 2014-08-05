<?php
namespace WDG\CoreBundle\Entity;
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
     * Set news
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNews $news
     * @return SfWdgNewsTags
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

    /**
     * Set tags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTags $tags
     * @return SfWdgNewsTags
     */
    public function setTags(\WDG\CoreBundle\Entity\SfWdgTags $tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return \WDG\CoreBundle\Entity\SfWdgTags 
     */
    public function getTags()
    {
        return $this->tags;
    }
}
