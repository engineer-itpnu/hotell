<?php
namespace Hotel\reserveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HotelController extends Controller
{
    public function homeAction()
    {
        return $this->render('HotelreserveBundle::layout_hotel.html.twig');
    }
}