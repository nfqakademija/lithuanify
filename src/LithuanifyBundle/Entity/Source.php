<?php

namespace LithuanifyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="source")
 */
class Source
{
    /**
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id")
     */
    private $language;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $url;

    /**
     * @ORM\Column(type="integer")
     */
    private $language_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $country;

    /**
     * @ORM\Column(type="integer")
     */
    private $last_crawl;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_of_news;

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
     * Set name
     *
     * @param string $name
     *
     * @return Source
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Source
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set language
     *
     * @param integer $language
     *
     * @return Source
     */
    public function setLanguage($languageId)
    {
        $this->language_id = $languageId;

        return $this;
    }

    /**
     * Get language
     *
     * @return integer
     */
    public function getLanguage()
    {
        return $this->language_id;
    }

    /**
     * Set country
     *
     * @param integer $country
     *
     * @return Source
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return integer
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set lastCrawl
     *
     * @param integer $lastCrawl
     *
     * @return Source
     */
    public function setLastCrawl($lastCrawl)
    {
        $this->last_crawl = $lastCrawl;

        return $this;
    }

    /**
     * Get lastCrawl
     *
     * @return integer
     */
    public function getLastCrawl()
    {
        return $this->last_crawl;
    }

    /**
     * Set numberOfNews
     *
     * @param integer $numberOfNews
     *
     * @return Source
     */
    public function setNumberOfNews($numberOfNews)
    {
        $this->number_of_news = $numberOfNews;

        return $this;
    }

    /**
     * Get numberOfNews
     *
     * @return integer
     */
    public function getNumberOfNews()
    {
        return $this->number_of_news;
    }

    /**
     * Set languageId
     *
     * @param integer $languageId
     *
     * @return Source
     */
    public function setLanguageId($languageId)
    {
        $this->language_id = $languageId;

        return $this;
    }

    /**
     * Get languageId
     *
     * @return integer
     */
    public function getLanguageId()
    {
        return $this->language_id;
    }
}
