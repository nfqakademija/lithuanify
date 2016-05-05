<?php

namespace LithuanifyBundle\Crawler\Ru\Mk;

use Doctrine\ORM\EntityManager;

class Parser
{
    protected $em;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function parsePage($pageData)
    {
        foreach ($pageData->extractorData->data[0]->group as $key => $value) {
            if ($key == 0) {
                $title = $value->Title[0]->text;
                $date = $value->MetaData[0]->text;
                $content = "";

                if (isset($value->Data)) {
                    foreach ($value->Data as $contentText) {
                        $content .= $contentText->text;
                    }
                }

            } else {
                $content .= $value->Data[0]->text . '<br>';
            }
        }

        $date = $this->getDate($date);

        return compact('title', 'content', 'date');
    }

    private function getDate($date)
    {
        if (strpos($date, 'Сегодня') !== false) {
            $date = strtotime('yesterday midnight');
        } elseif (strpos($date, 'Вчера') !== false) {
            $date = strtotime('today midnight');
        } else {
            $date = "27 апреля 2016 в 09:02, просмотров: 545";
            $dateData = explode(" ", $date);
            $month = $this->parseRussianMonths($dateData[1]);
            $date = strtotime($dateData[2] . "-" . $month . "-" . $dateData[0]);
        }

        return $date;
    }

    private function parseRussianMonths($month)
    {
        switch ($month) {
            case 'января':
                return 1;
            case 'февраля':
                return 2;
            case 'марта':
                return 3;
            case 'апреля':
                return 4;
            case 'мая':
                return 5;
            case 'июня':
                return 6;
            case 'июля':
                return 7;
            case 'августа':
                return 8;
            case 'сентября':
                return 9;
            case 'октября':
                return 10;
            case 'ноября':
                return 11;
            case 'декабря':
                return 12;
        }
    }
}