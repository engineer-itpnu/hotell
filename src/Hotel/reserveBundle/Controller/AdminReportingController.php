<?php
namespace Hotel\reserveBundle\Controller;

use Hotel\reserveBundle\Form\ReportingReserveType;
use Hotel\reserveBundle\Form\reportingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminReportingController extends Controller
{
    public function financialAccountsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this ->createForm(new reportingType());

        $qb = $em->createQueryBuilder()
            ->select('account')
            ->from("HotelreserveBundle:accountEntity","account")
            ->orderBy("account.id","DESC");

        if($request->isMethod("post"))
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $data = $form->getData();
                if($data['fromDateTime']!=null) $qb = $qb->andWhere('account.DateTime >= :fromdate')->setParameter('fromdate',$data['fromDateTime']);
                if($data['toDateTime']!=null) $qb = $qb->andWhere('account.DateTime <= :todate')->setParameter('todate',$data['toDateTime']);
                if($data['type']!=null) $qb = $qb->andWhere('account.type = :type')->setParameter('type',$data['type']);
                if($data['agencyEntity']!=null) $qb = $qb->andWhere('account.agencyEntity = :agencyEntity')->setParameter('agencyEntity',$data['agencyEntity']);
                if($data['hotelEntity']!=null)
                    $qb = $qb->andWhere('account.hotelEntity = :hotelEntity')->setParameter('hotelEntity',$data['hotelEntity']);
                elseif($data['hotel_city']!=null || $data['hotel_city']!="")
                    $qb = $qb->innerJoin("account.hotelEntity","hotel")
                        ->andWhere('hotel.hotel_city = :hotel_city')->setParameter('hotel_city',$data['hotel_city']->getHotelCity());
            }
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb->getQuery(),
            $this->get('request')->query->get('page', 1),
            10
        );

        return $this->render('HotelreserveBundle:admin_reporting:FinancialAccounts.html.twig',array(
            'entities'=>$pagination,
            'form' => $form->createView()
        ));
    }

    public function reservingOfHotelsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this ->createForm(new ReportingReserveType());

        $qb = $em->createQueryBuilder()
            ->select('reserve')
            ->from("HotelreserveBundle:reserveEntity","reserve")
            ->innerJoin("reserve.customerEntity","customer")
            ->orderBy("reserve.id","DESC");

        if($request->isMethod("post"))
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $data = $form->getData();
                if($data['RfromDateTime']!=null) $qb = $qb->andWhere('reserve.DateInp >= :fromdate')->setParameter('fromdate',$data['fromDateTime']);
                if($data['RtoDateTime']!=null)   $qb = $qb->andWhere('reserve.DateInp <= :todate')->setParameter('todate',$data['toDateTime']);

                if($data['cust_name']!="")   $qb = $qb->andWhere('reserve.cust_name LIKE :cust_name')->setParameter('cust_name',"%".$data['cust_name']."%");
                if($data['cust_family']!="") $qb = $qb->andWhere('reserve.cust_family LIKE :cust_family')->setParameter('cust_family',"%".$data['cust_family']."%");
                if($data['cust_mobile']!="") $qb = $qb->andWhere('reserve.cust_mobile = :cust_mobile')->setParameter('cust_mobile',$data['cust_mobile']);

                if($data['CodePey']!=null)   $qb = $qb->andWhere('reserve.CodePey = :CodePey')->setParameter('CodePey',$data['CodePey']);
                if($data['Voucher']!=null && $data['ReserveType']==null)
                                             $qb = $qb->andWhere('reserve.Voucher = :Voucher')->setParameter('Voucher',$data['Voucher']);
                if($data['ReserveType']!=null)
                {
                    if($data['ReserveType']==1) $qb = $qb->andWhere('reserve.Voucher is null');
                    else                        $qb = $qb->andWhere('reserve.Voucher is not null');
                }

                if($data['RagencyEntity']!=null) $qb = $qb->andWhere('reserve.agencyEntity = :RagencyEntity')->setParameter('RagencyEntity',$data['RagencyEntity']);

                if($data['RhotelEntity']!=null)
                    $qb = $qb->innerJoin("reserve.blankEntities","blank")
                        ->innerJoin("blank.roomEntity","room")
                        ->andWhere('room.hotelEntity = :hotelEntity')->setParameter('hotelEntity',$data['RhotelEntity']);
                elseif($data['hotel_city']!=null || $data['hotel_city']!="")
                    $qb = $qb->innerJoin("reserve.blankEntities","blank")
                        ->innerJoin("blank.roomEntity","room")
                        ->innerJoin("room.hotelEntity","hotel")
                        ->andWhere('hotel.hotel_city = :hotel_city')->setParameter('hotel_city',$data['hotel_city']->getHotelCity());
            }
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb->getQuery(),
            $this->get('request')->query->get('page', 1),
            10
        );

        return $this->render('HotelreserveBundle:admin_reporting:ReservingOfHotels.html.twig',array(
            'entities'=>$pagination,
            'form' => $form->createView()
        ));
    }

    public function reservingOfHotelsShowAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:reserveEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find reserveEntity entity.');
        }

        return $this->render('HotelreserveBundle:admin_reporting:reservingOfHotelsShow.html.twig', array(
            'entity'      => $entity,
        ));
    }

    public function listHotelByCityAction(Request $request)
    {
        $city = $request->get("city","");
        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository("HotelreserveBundle:hotelEntity")->findBy(array("hotel_city"=>$city));
        $res = '<option value="">همه هتل ها</option>';
        foreach ($hotels as $hotel)
            $res .= '<option value="'.$hotel->getId().'">'.$hotel->getHotelName().'</option>';
        return new Response($res);
    }
}