<?php

namespace LithuanifyBundle\Entity;

use DateTime;

/**
 * Class DatePicker
 * @package LithuanifyBundle\Entity
 */
class DatePicker
{

    protected $beginDate;
    protected $endDate;
    /**
     * @return DateTime
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * @param DateTime $beginDate
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
    }

    /**
     * @return DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param DateTime $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }
}
