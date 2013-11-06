<?php

namespace Hotel\reserveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function adminAction()
    {
        return $this->render('HotelreserveBundle::layout_admin.html.twig');
    }
}
