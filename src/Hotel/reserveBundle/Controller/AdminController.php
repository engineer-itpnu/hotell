<?php

namespace Hotel\reserveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function adminAction()
    {
        return $this->render('HotelreserveBundle::layout_admin.html.twig');
    }
    public function homeAction()
    {
        return $this->render('HotelreserveBundle:admin:home_page_admin.html.twig');
    }
    public function addhotelAction()
    {
        return $this->render('HotelreserveBundle:admin:definition_hotel_admin.html.twig');
    }
    public function addroomAction()
    {
        return $this->render('HotelreserveBundle:admin:definition_room_admin.html.twig');
    }
    public function adduserAction()
    {
        return $this->render('HotelreserveBundle:admin:definition_room_admin.html.twig');
    }
}
