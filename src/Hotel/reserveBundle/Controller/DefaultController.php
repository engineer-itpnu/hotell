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
    public function reportAction()
    {
        return $this->render('HotelreserveBundle:Default:AdminReporting.html.twig');
    }
    public function managehtlAction()
    {
        return $this->render('HotelreserveBundle:Default:AdminManageHtl.html.twig');
    }
    public function manageageAction()
    {
        return $this->render('HotelreserveBundle:Default:AdminManageAge.html.twig');
    }
    public function searchAction()
    {
        return $this->render('HotelreserveBundle:Default:AdminSearch.html.twig');
    }
}
