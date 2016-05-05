<?php
/**
 * Created by PhpStorm.
 * User: Rokas
 * Date: 05/05/16
 * Time: 14:35
 */

namespace LithuanifyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LithuanifyBundle\Entity\Country;


class LoadCountryData implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        if (($handle = fopen(__DIR__ . "/countries.csv", "r")) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                $country = new Country();
                $country->setName($data[0]);
                $country->setLat($data[6]);
                $country->setLng($data[7]);
                $country->setFlag($data[4]);

                $manager->persist($country);
                $manager->flush();
            }
            fclose($handle);
        }
    }
}