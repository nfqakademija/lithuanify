<?php
/**
 * Created by PhpStorm.
 * User: Rokas
 * Date: 05/05/16
 * Time: 23:58
 */

namespace LithuanifyBundle\Entity;


class EventPicker
{
    private $event;

    /**
     * @param mixed $event
     * @return EventPicker
     */
    public function setEvent($event)
    {
        return $this->event = $event;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }
    
    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->event->getKeywords();
    }

    /**
     * @return string
     */
    public function getCurrentDate()
    {
        return $this->event->getDate();
    }

}