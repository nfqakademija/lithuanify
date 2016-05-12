<?php

namespace LithuanifyBundle\Controller;

use LithuanifyBundle\Entity\DatePicker;
use LithuanifyBundle\Entity\EventPicker;
use LithuanifyBundle\Form\DatePick;
use LithuanifyBundle\Form\EventPick;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package LithuanifyBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $datePick = new DatePicker();
        $eventPick = new EventPicker();
        $form = $this->createForm(DatePick::class, $datePick);
        $form1 = $this->createForm(EventPick::class, $eventPick);

        $articleManager = $this->get('article_manager');
        $datePick->setBeginDate(new \DateTime());
        $datePick->setEndDate(new \DateTime());
        $form->get('beginDate')->setData(new \DateTime());
        $form->get('endDate')->setData(new \DateTime());

        $articles = $articleManager->searchArticles($datePick);
        $rawArticles = $articleManager->buildArray($articles);

        $form1->handleRequest($request);
        if ($form1->isValid()) {
            $event = date('m/d/Y', $eventPick->getCurrentDate());
            $datePick->setBeginDate(new \DateTime($event));
            $datePick->setEndDate(new \DateTime($event));
            $form->get('beginDate')->setData(new \DateTime($event));
            $form->get('endDate')->setData(new \DateTime($event));
            $articles = $articleManager->searchArticles($datePick);
            $rawArticles = $articleManager->buildArray($articles);
        }

        $form->handleRequest($request);
        if ($form->isValid()) {
            $articles = $articleManager->searchArticles($datePick);
            $rawArticles = $articleManager->buildArray($articles);
        }

        return $this->render('LithuanifyBundle:Default:index.html.twig', [
                'form' => $form->createView(),
                'form1' => $form1->createView(),
                'articles' => $rawArticles,
        ]);
    }
    /**
     * @Route("/data/{password}")
     * @param string $password
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dataAction($password)
    {
        if (strcmp(md5($password), 'c809de5615bf8936b09b1da2f714032a') == 0) {
            $crawler = $this->get('mk.crawler');
            $crawler->setCrawlerDateLimit(strtotime('2016/05/05'));
            $nextPage = $crawler->getOuterPage();

            do {
                $crawler->getOuterPage($nextPage);
            } while (!is_null($nextPage));
        }

        return $this->render('LithuanifyBundle:Default:crawler.html.twig');
    }
}
