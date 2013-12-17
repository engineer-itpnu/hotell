<?php

namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Hotel\reserveBundle\Entity\accountEntity;
use Hotel\reserveBundle\Form\accountEntityType;

class accountEntityController extends Controller
{
    public function AdminIndexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:accountEntity')->findAll();

        return $this->render('HotelreserveBundle:accountEntity:Adminindex.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function HoteldarIndexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder()
            ->select('account')
            ->from('HotelreserveBundle:accountEntity','account')
            ->innerJoin('account.hotelEntity','hotel')
            ->innerJoin('hotel.userEntity','user')
            ->where('user = :u')->setParameter('u',$this->getUser());

        $entities = $qb->getQuery()->getResult();

        return $this->render('HotelreserveBundle:accountEntity:hotelIndex.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function AgencyIndexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder()
            ->select('account')
            ->from('HotelreserveBundle:accountEntity','account')
            ->innerJoin('account.agencyEntity','agency')
            ->innerJoin('agency.userEntity','user')
            ->where('user = :u')->setParameter('u',$this->getUser());

        $entities = $qb->getQuery()->getResult();

        return $this->render('HotelreserveBundle:accountEntity:agencyIndex.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:accountEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find accountEntity entity.');
        }

        return $this->render('HotelreserveBundle:accountEntity:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
