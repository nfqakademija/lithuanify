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

/**
 * Class LoadCountryData
 * @package LithuanifyBundle\DataFixtures\ORM
 */
class LoadCountryData implements FixtureInterface
{

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        if (($handle = fopen(__DIR__."/countries.csv", "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
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
