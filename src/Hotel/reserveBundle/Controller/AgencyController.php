<?php
namespace Hotel\reserveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AgencyController extends Controller
{
    public function homeAction()
    {
        return $this->render('HotelreserveBundle::layout_agency.html.twig');
    }
}