<?php

namespace Hotel\reserveBundle\Controller;

use Doctrine\ORM\EntityRepository;
use Hotel\reserveBundle\Entity\blankEntity;
use Hotel\reserveBundle\Form\reportingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function mainAction()
    {
        return $this->render('HotelreserveBundle::index.html.twig');
    }
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createFormBuilder()
            ->add("hotel","entity",array(
                'class' => 'HotelreserveBundle:hotelEntity',
                'property' => 'hotel_name',
                'query_builder' => function(EntityRepository $er) use ($user) {
                    $er = $er->createQueryBuilder('u')
                        ->where("u.hotel_active = :true")->setParameter("true",true);
                    if($user->hasRole('ROLE_HOTELDAR'))
                        $er = $er->andWhere("u.userEntity = :user")->setParameter("user",$user);
                    return $er;
                }))
            ->add("year","text")
            ->add("month","choice",array("choices"=>array(
                "1"=>"فروردین",
                "2"=>"اردیبهشت",
                "3"=>"خرداد",
                "4"=>"تیر",
                "5"=>"مرداد",
                "6"=>"شهریور",
                "7"=>"مهر",
                "8"=>"آبان",
                "9"=>"آذر",
                "10"=>"دی",
                "11"=>"بهمن",
                "12"=>"اسفند"
            )))
            ->getForm();

        $rooms = null;
        $data = array('year' => '0', 'month'=>0);
        $hotelid = null;

        if($request->isMethod("post"))
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $data = $form->getData();
                $hotel = $data['hotel'];

                $qb = $em->createQueryBuilder()
                    ->select("room")
                    ->from("HotelreserveBundle:roomEntity","room")
                    ->where("room.hotelEntity = :hotel")->setParameter("hotel",$hotel)
                ;
                $rooms = $qb->getQuery()->getResult();
                $hotelid = $hotel->getId();
            }
        }

        return $this->render('HotelreserveBundle:Default:index.html.twig',array(
            'form' => $form->createView(),
            'rooms' => $rooms,
            'year' => $data['year'],
            'month' => $data['month'],
            'hotelid' => $hotelid
        ));
    }
    public function editAction($hotelid, $year, $month)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $hotel = $em->getRepository("HotelreserveBundle:hotelEntity")->find($hotelid);
        $user = $this->getUser();
        if($hotel == null || ($user->hasRole("ROLE_HOTELDAR") && $hotel->getUserEntity()!=$user))
            return $this->redirect($this->generateUrl("monitoring"));

        $qb = $em->createQueryBuilder()
            ->select("room")
            ->from("HotelreserveBundle:roomEntity","room")
            ->where("room.hotelEntity = :hotel")->setParameter("hotel",$hotel)
            ;
        $rooms = $qb->getQuery()->getResult();

        return $this->render('HotelreserveBundle:Default:edit.html.twig',array(
            'rooms' => $rooms,
            'year' => $year,
            'month' => $month,
            'hotelid' => $hotelid
        ));
    }

    public function getStatusRoomInMonthAction($roomid,$year,$month)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $room = $em->getRepository("HotelreserveBundle:roomEntity")->find($roomid);

        $result = "timeline_add_row(".$roomid.",'".$room->getRoomName()."','"."aaaaa"."', [";

        $dateconvertor = $this->get("my_date_convert");
        $fromdate = $dateconvertor->ShamsiToMiladi($year."/".$month."/1");
        $todate = $dateconvertor->ShamsiToMiladi($year."/".$month."/".($month<=6?31:30));

        $qb = $em->createQueryBuilder()
            ->select("blank")
            ->from("HotelreserveBundle:blankEntity","blank")
            ->where("blank.roomEntity = :room")->setParameter("room",$room)
            ->andWhere("blank.dateIN >= :fromdate")->setParameter("fromdate",$fromdate)
            ->andWhere("blank.dateIN <= :todate")->setParameter("todate",$todate)
            ->orderBy("blank.dateIN","ASC")
            ;
        $blanks = $qb->getQuery()->getResult();


        $prev = null;
        foreach($blanks as $blank)
        {
            if($prev == null)
            {
                $result .= "[".$blank->getStatus().",'";
                $result .= explode("/",$dateconvertor->MiladiToShamsi($blank->getDateIN()))[2];
            }

            else if($prev!=null && ($blank->getStatus()!=$prev->getStatus() || date_diff($blank->getDateIN(),$prev->getDateIN())->format("%a") != "1" || ( $blank->getStatus()!=0 && ($blank->getTariff()!=$prev->getTariff() || ($blank->getReserveEntity() != $prev->getReserveEntity()) ) )))
            {
                $result .= "',".$blank->getTariff()."],[".$blank->getStatus().",'";
                $result .= explode("/",$dateconvertor->MiladiToShamsi($blank->getDateIN()))[2];
            }
            else
                $result .= "-".explode("/",$dateconvertor->MiladiToShamsi($blank->getDateIN()))[2];

            $prev = $blank;
        }
        if($prev!=null)$result .= "',".$blank->getTariff()."]";
        $result.=  "]);";
        return new Response($result);
    }

    public function reportAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $form = $this ->createForm(new reportingType());

        $qb = $em->createQueryBuilder()
            ->select('account')
            ->from("HotelreserveBundle:accountEntity","account");
        if($request->isMethod("post"))
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $data = $form->getData();
                if($data['type']!=null) $qb = $qb->andWhere('account.type = :type')->setParameter('type',$data['type']);
                if($data['hotelEntity']!==null) $qb = $qb->andWhere('account.hotelEntity = :hotelEntity')->setParameter('hotelEntity',$data['hotelEntity']);
                if($data['agencyEntity']!=null) $qb = $qb->andWhere('account.agencyEntity = :agencyEntity')->setParameter('agencyEntity',$data['agencyEntity']);

                if($data['fromDateTime']!=null) $qb = $qb->andWhere('account.DateTime >= :fromdate')->setParameter('fromdate',$data['fromDateTime']);
                if($data['toDateTime']!=null) $qb = $qb->andWhere('account.DateTime <= :todate')->setParameter('todate',$data['toDateTime']);
            }
        }

        $entities = $qb->getQuery()->getResult();

        return $this->render('HotelreserveBundle:Default:AdminReporting.html.twig',array(
            'entities'=>$entities,
            'form' => $form->createView()
        ));
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
    public function paymentAction()
    {
        return $this->render('HotelreserveBundle:Default:AgencyPayment.html.twig');
    }
}
