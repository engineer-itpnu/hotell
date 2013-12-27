<?php
namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hotel\reserveBundle\Entity\hotelEntity;
use Hotel\reserveBundle\Form\hotelEntityType;

class HotelHotelController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder()
            ->select('hotel')
            ->from('HotelreserveBundle:hotelEntity', 'hotel')
            ->where("hotel.userEntity = :user")->setParameter("user",$this->getUser())
            ->andWhere("hotel.hotel_active = 1");

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb->getQuery(),
            $this->get('request')->query->get('page', 1),
            10
        );

        return $this->render('HotelreserveBundle:hotel_hotel:index.html.twig', array(
            'entities' => $pagination,
        ));
    }
}
