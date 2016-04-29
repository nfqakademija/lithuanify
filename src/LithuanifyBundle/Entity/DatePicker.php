<?php

namespace LithuanifyBundle\Entity;

/**
 * Class DatePicker
 * @package LithuanifyBundle\Entity
 */
class DatePicker {

    protected $beginDate;
    protected $endDate;

    /**
     * @return string
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * @param string $beginDate
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

}