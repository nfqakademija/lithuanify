<?php

namespace LithuanifyBundle\Controller;

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
        return $this->render('LithuanifyBundle:Default:index.html.twig');
    }
}
