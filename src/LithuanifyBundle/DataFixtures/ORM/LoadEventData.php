<?php
/**
 * Created by PhpStorm.
 * User: Rokas
 * Date: 05/05/16
 * Time: 22:11
 */

namespace LithuanifyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LithuanifyBundle\Entity\Event;

class LoadEventData implements FixtureInterface
{

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $event1 = new Event();
        $event1->setName("Laisvės gynėjų diena");
        $event1->setDate(strtotime('13-01-1991'));
        $event1->setKeywords("nepriklausomybe");
        $manager->persist($event1);

        $event2 = new Event();
        $event2->setName("Lietuvos valstybės atkurimo diena");
        $event2->setDate(strtotime('16-02-1918'));
        $event2->setKeywords("nepriklausomybe");
        $manager->persist($event2);

        $event3 = new Event();
        $event3->setName("Lietuvos nepriklausomybės atkūrimo diena");
        $event3->setDate(strtotime('11-03-1990'));
        $event3->setKeywords("nepriklausomybe");
        $manager->persist($event3);

        $manager->flush();
    }
}