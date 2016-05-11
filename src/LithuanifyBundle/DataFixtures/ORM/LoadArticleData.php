<?php

namespace LithuanifyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use LithuanifyBundle\Entity\Article;

/**
 * Class LoadArticleData
 * @package LithuanifyBundle\DataFixtures\ORM
 */
class LoadArticleData extends AbstractFixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        if (($handle = fopen(__DIR__."/articles.csv", "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $article = new Article();
                $article->setTitle($data[0]);
                $article->setContent($data[1]);
                $article->setImage($data[2]);
                $article->setDate($data[3]);
                $article->setCountryId($data[4]);
                $article->setNewsUrl($data[5]);
                $article->setEventId(null);
                $article->setSourceId(null);

                $manager->persist($article);
                $manager->flush();
            }
            fclose($handle);
        }
    }
}
