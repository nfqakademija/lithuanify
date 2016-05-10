<?php

namespace LithuanifyBundle\Controller;

use LithuanifyBundle\Entity\Article;
use LithuanifyBundle\Entity\Country;
use LithuanifyBundle\Entity\DatePicker;
use LithuanifyBundle\Form\DatePick;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use LithuanifyBundle\Crawler\Ru\Mk\Parser;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        //AIzaSyDBNALb8hqG3FKicI_mEBL_SomBzrn57NI

        $datePick = new DatePicker();
        $form = $this->createForm(DatePick::class, $datePick);

        return $this->render('LithuanifyBundle:Default:index.html.twig',
        [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/data")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dataAction()
    {
        $crawler = $this->get('mk.crawler');
        $nextPage = $crawler->getOuterPage();

        do {
            $crawler->getOuterPage($nextPage);
        } while (!is_null($nextPage));
    }

    public function importCountries()
    {
        if (($handle = fopen("/Users/rokasstasys/Sites/lithuanify/countries.csv", "r")) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                $country = new Country();
                $country->setName($data[0]);
                $country->setLat($data[6]);
                $country->setLng($data[7]);
                $country->setFlag($data[4]);

                $em = $this->getDoctrine()->getManager();
                $em->persist($country);
                $em->flush();
            }
            fclose($handle);
        }
    }
}
