<?php

namespace LithuanifyBundle\Utility;

use Doctrine\Common\Persistence\ManagerRegistry;
use LithuanifyBundle\Entity\DatePicker;

/**
 * Class ArticleManager
 * @package LithuanifyBundle\Utility
 */
class ArticleManager
{

    private $managerRegistry;

    /**
     * ArticleManager constructor.
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    /**
     * @param DatePicker $date
     * @return array
     */
    public function searchArticles(DatePicker $date)
    {
        $query = $this->managerRegistry->getManager()->createQuery(
            'SELECT p
                FROM LithuanifyBundle:Article p
                WHERE p.date >= :beginDate
                AND p.date <= :endDate
                ORDER BY p.country ASC'
        )
        ->setParameter('beginDate', strtotime($date->getBeginDate()->format('d/m/Y')))
        ->setParameter('endDate', strtotime($date->getEndDate()->format('d/m/Y')));

        return $query->getResult();
    }

    /**
     * @param array $articles
     * @return array
     */
    public function buildArray(array $articles)
    {
        $rawArticles = array();
        foreach ($articles as $article) {
            $countries = array_column($rawArticles, 0);
            $foundCountry = false;
            $countriesSize = sizeof($countries);
            for ($j = 0; $j < $countriesSize; $j++) {
                if (strcmp($countries[$j], $article->getCountry()->getName()) == 0) {
                    $foundCountry = true;
                    array_push($rawArticles[$j][3], array($article->getTitle(), $article->getContent()));
                }
            }
            if ($foundCountry === false) {
                array_push($rawArticles, array(
                    $article->getCountry()->getName(),
                    $article->getCountry()->getLat(),
                    $article->getCountry()->getLng(),
                    array(array($article->getTitle(), $article->getContent())),
                ));
            }
        }

        return $rawArticles;
    }
}
