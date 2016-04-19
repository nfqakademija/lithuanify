<?php

namespace LithuanifyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="article")
 */
class Article
{
    /**
     * @ORM\OneToOne(targetEntity="Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    /**
     * @ORM\OneToOne(targetEntity="Event")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;

    /**
     * @ORM\OneToOne(targetEntity="Source")
     * @ORM\JoinColumn(name="source_id", referencedColumnName="id")
     */
    private $source;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $country_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $date;

    /**
     * @ORM\Column(type="string")
     */
    private $news_url;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $event_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $source_id;

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
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set countryId
     *
     * @param integer $countryId
     *
     * @return Article
     */
    public function setCountryId($countryId)
    {
        $this->country_id = $countryId;

        return $this;
    }

    /**
     * Get countryId
     *
     * @return integer
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * Set date
     *
     * @param integer $date
     *
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return integer
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set newsUrl
     *
     * @param string $newsUrl
     *
     * @return Article
     */
    public function setNewsUrl($newsUrl)
    {
        $this->news_url = $newsUrl;

        return $this;
    }

    /**
     * Get newsUrl
     *
     * @return string
     */
    public function getNewsUrl()
    {
        return $this->news_url;
    }

    /**
     * Set eventId
     *
     * @param integer $eventId
     *
     * @return Article
     */
    public function setEventId($eventId)
    {
        $this->event_id = $eventId;

        return $this;
    }

    /**
     * Get eventId
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Set sourceId
     *
     * @param integer $sourceId
     *
     * @return Article
     */
    public function setSourceId($sourceId)
    {
        $this->source_id = $sourceId;

        return $this;
    }

    /**
     * Get sourceId
     *
     * @return integer
     */
    public function getSourceId()
    {
        return $this->source_id;
    }

    /**
     * Set country
     *
     * @param \LithuanifyBundle\Entity\Country $country
     *
     * @return Article
     */
    public function setCountry(\LithuanifyBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \LithuanifyBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set event
     *
     * @param \LithuanifyBundle\Entity\Event $event
     *
     * @return Article
     */
    public function setEvent(\LithuanifyBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \LithuanifyBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set source
     *
     * @param \LithuanifyBundle\Entity\Source $source
     *
     * @return Article
     */
    public function setSource(\LithuanifyBundle\Entity\Source $source = null)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return \LithuanifyBundle\Entity\Source
     */
    public function getSource()
    {
        return $this->source;
    }
}
