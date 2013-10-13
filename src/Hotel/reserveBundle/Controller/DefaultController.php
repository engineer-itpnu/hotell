<?php

namespace Hotel\reserveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HotelreserveBundle:Default:index.html.twig', array('name' => $name));
    }
    public function mainAction()
    {
        return $this->render('HotelreserveBundle::main.html.twig');
    }
    public function loginAction()
    {
        return $this->render('HotelreserveBundle::login.html.twig');
    }
}
