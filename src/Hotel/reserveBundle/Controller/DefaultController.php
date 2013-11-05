<?php

namespace Hotel\reserveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function mainAction()
    {
        return $this->render('HotelreserveBundle::index.html.twig');
    }
    public function indexAction()
    {
        return $this->render('HotelreserveBundle:Default:index.html.twig');
    }
}
