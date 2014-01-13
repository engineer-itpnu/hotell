<?php
namespace Hotel\reserveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HotelHotelController extends Controller
{
    public function indexAction()
    {
        $page = $this->getRequest()->get("page", $this->getRequest()->getSession()->get("hotel_page",1));
        $this->getRequest()->getSession()->set("hotel_page",$page);

        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder()
            ->select('hotel')
            ->from('HotelreserveBundle:hotelEntity', 'hotel')
            ->where("hotel.userEntity = :user")->setParameter("user",$this->getUser())
            ->andWhere("hotel.hotel_active = 1");

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb->getQuery(),
            $page,
            10
        );

        return $this->render('HotelreserveBundle:hotel_hotel:index.html.twig', array(
            'entities' => $pagination,
        ));
    }
}
