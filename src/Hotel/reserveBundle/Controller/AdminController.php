<?php

namespace Hotel\reserveBundle\Controller;

use Hotel\reserveBundle\Handler\dateConvert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function adminAction()
    {
//        die(dateConvert::gregorian_to_jalali(2013,11,9,"/"));
        return $this->render('HotelreserveBundle::layout_admin.html.twig');
    }
}
