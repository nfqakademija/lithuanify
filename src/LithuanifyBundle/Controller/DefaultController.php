<?php

namespace LithuanifyBundle\Controller;

use LithuanifyBundle\Entity\Article;
use LithuanifyBundle\Entity\Country;
use LithuanifyBundle\Entity\DatePicker;
use LithuanifyBundle\Form\DatePick;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
        $apiKey = '5afb00834532417d9e6a033abe6dfc09938db9122c38aa67153f65608831ec19d77821d17f57a1392bf7dd9715a4eb154b71c51886e00681b5924833b907523cff1f1edb5869b759ed2a5ec091fae469';
        $outer = 'https://extraction.import.io/query/runtime/051c1d72-4841-4917-8fe7-7f2f92419229?_apikey=';
        $inner = 'https://extraction.import.io/query/runtime/22f06d81-5536-477c-bbeb-7c848bc992ba?_apikey=';
        $outerFirstSource = 'http://www.mk.ru/search/?q=%D0%BB%D0%B8%D1%82%D0%B2%D0%B0';

        $outerUrl = $outer . $apiKey . '&url=' . $outerFirstSource;
        $firstPage = json_decode(file_get_contents($outerUrl));

        foreach ($firstPage->extractorData->data[0]->group[0]->LINK as $source) {
            $a = file_get_contents($inner . $apiKey . '&url=' . $source->href);
            $a = json_decode($a);

            foreach ($a->extractorData->data[0]->group as $key => $value) {
                if ($key == 0) {
                    $title = $value->Title[0]->text;
                    $content = "";
                } else {
                    $content .= $value->Data[0]->text . '<br>';
                }
            }

            $article = new Article();
            $article->setTitle($title);
            $article->setContent($content);
            $article->setNewsUrl($source->href);
            $article->setEventId(1);
            $article->setSourceId(1);
            $article->setDate(123);
            $article->setCountryId(1);

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
        }

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
