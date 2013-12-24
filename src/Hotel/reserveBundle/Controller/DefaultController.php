<?php

namespace Hotel\reserveBundle\Controller;

use Doctrine\ORM\EntityRepository;
use Hotel\reserveBundle\Entity\blankEntity;
use Hotel\reserveBundle\Form\ReportingReserveType;
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
    public function indexAction(Request $request,$hotelid=null, $year=null, $month=null)
    {
        $date_convert = $this->get("my_date_convert");
        $now = explode("/",$date_convert->MiladiToShamsi(new \DateTime()));
        $doSearch = false;
        $em = $this->getDoctrine()->getManager();
        $rooms = null;
        $weekDay = null;
        $user = $this->getUser();
        $search = array('year'=>$now[0],'month'=>$now[1],'hotel'=>null);
        if( $year!=null && $month!=null && $hotelid!= null )
        {
            $search['year'] = $year;
            $search['month'] = $month;
            $search['hotel'] = $em->getRepository("HotelreserveBundle:hotelEntity")->find($hotelid);
            $doSearch = true;
        }
        $form = $this->createFormBuilder($search)
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

        $data = array('year' => '0', 'month'=>0);
        $hotelid = null;

        if($request->isMethod("post"))
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $doSearch = true;
            }
        }

        if($doSearch)
        {
            $data = $form->getData();
            $hotel = $data['hotel'];

            $qb = $em->createQueryBuilder()
                ->select("room")
                ->from("HotelreserveBundle:roomEntity","room")
                ->where("room.hotelEntity = :hotel")->setParameter("hotel",$hotel)
            ;
            $rooms = $qb->getQuery()->getResult();
            $hotelid = $hotel->getId();
            $weekDay = $date_convert->getWeekDayNumber($data['year']."/".$data['month']."/1");
        }

        return $this->render('HotelreserveBundle:Default:index.html.twig',array(
            'form' => $form->createView(),
            'rooms' => $rooms,
            'year' => $data['year'],
            'month' => $data['month'],
            'hotelid' => $hotelid,
            'weekDay' => $weekDay
        ));
    }
    public function editAction(Request $request,$hotelid, $year, $month)
    {
        $dateconvertor = $this->get("my_date_convert");
        $em = $this->getDoctrine()->getManager();

        $hotel = $em->getRepository("HotelreserveBundle:hotelEntity")->find($hotelid);
        $user = $this->getUser();
        if($hotel == null || ($user->hasRole("ROLE_HOTELDAR") && $hotel->getUserEntity()!=$user) || $user->hasRole("ROLE_AGENCY"))
            return $this->redirect($this->generateUrl("monitoring"));

        $weekDay = $dateconvertor->getWeekDayNumber($year."/".$month."/1");

        if($request->isMethod("post"))
        {
            $empty_added = json_decode(stripslashes($request->request->get("empty_added")),true);
            $empty_deleted = json_decode(stripslashes($request->request->get("empty_deleted")),true);

            foreach($empty_deleted as $roomid=>$days)
            {
                $room = $em ->getRepository("HotelreserveBundle:roomEntity")->find($roomid);
                foreach($days as $day)
                {
                    $date = $dateconvertor->ShamsiToMiladi($year."/".$month."/".$day);
                    if(!$date) continue;
                    $blank = $em ->getRepository("HotelreserveBundle:blankEntity")->findOneBy(array("roomEntity"=>$room,"dateIN"=>$date));
                    $em->remove($blank);
                }
            }
            $em->flush();

            foreach($empty_added as $roomid=>$days)
            {
                $room = $em ->getRepository("HotelreserveBundle:roomEntity")->find($roomid);
                foreach($days as $day=>$tariff)
                {
                    $date = $dateconvertor->ShamsiToMiladi($year."/".$month."/".$day);
                    if(!$date) continue;
                    $blank = $em ->getRepository("HotelreserveBundle:blankEntity")->findOneBy(array("roomEntity"=>$room,"dateIN"=>$date));
                    if($blank) continue;
                    $blank = new blankEntity();
                    $blank->setDateIN($date);
                    $blank->setRoomEntity($room);
                    $blank->setStatus(0);
                    $blank->setTariff($tariff);
                    $em->persist($blank);
                }
            }
            $em->flush();

            return $this->redirect($this->generateUrl("monitoring",array(
                'year' => $year,
                'month' => $month,
                'hotelid' => $hotelid
            )));
        }

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
            'hotelid' => $hotelid,
            'weekDay' => $weekDay
        ));
    }

    public function getStatusRoomInMonthAction($roomid,$year,$month,$editable)
    {
        $em = $this->getDoctrine()->getManager();
        $room = $em->getRepository("HotelreserveBundle:roomEntity")->find($roomid);

        $roomTypes = array(
            '1' => 'سوئيت vip', '2' => 'سوئيت جونيور', '3' => 'سوئيت پرزيدنت', '4' => 'سوئيت رويال',
            '5' => 'سوئيت امپريال', '6' => 'سوئيت لاکچري', '7' => 'سوئيت دوبلکس', '8' => 'سوئيت لوکس', '9' => 'پرنسس روم',
            '10' => 'پرزيدنتال', '11' => 'تريپل', '12' => 'سينگل', '13' => 'دبل', '14' => 'کانکت روم',
            '15' => 'آپارتمان', '16' => 'آپارتمان رويال', '17' => 'سوئيت'
        );

        if($editable == false)
            $result = "timeline_add_row_notEdit(".$roomid.",'".$room->getRoomName()."','".$roomTypes[$room->getRoomType()]."', [";
        else
            $result = "timeline_add_row(".$roomid.",'".$room->getRoomName()."','".$roomTypes[$room->getRoomType()]."', [";


        $dateconvertor = $this->get("my_date_convert");
        $fromdate = $dateconvertor->ShamsiToMiladi($year."/".$month."/0");

        $lastdayMonth = 31;
        if ($month>6) $lastdayMonth = 30;
        if($month == 12 && !$dateconvertor->isLeap($year)) $lastdayMonth = 29;

        $todate = $dateconvertor->ShamsiToMiladi($year."/".$month."/".$lastdayMonth);

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
                $d = explode("/",$dateconvertor->MiladiToShamsi($blank->getDateIN()));
                $result .= $d[2];
            }
            else if($prev!=null && ($blank->getStatus()!=$prev->getStatus() || date_diff($blank->getDateIN(),$prev->getDateIN())->format("%a") != "1" || ( $blank->getStatus()!=0 && ($blank->getTariff()!=$prev->getTariff() || ($blank->getReserveEntity() != $prev->getReserveEntity()) ) )))
            {
                $result .= "',".$prev->getTariff()."],[".$blank->getStatus().",'";
                $d = explode("/",$dateconvertor->MiladiToShamsi($blank->getDateIN()));
                $result .= $d[2];
            }
            else
            {
                $d = explode("/",$dateconvertor->MiladiToShamsi($blank->getDateIN()));
                $result .= "-".$d[2];
            }

            $prev = $blank;
        }
        if($prev!=null)$result .= "',".$prev->getTariff()."]";
        $result.=  "]);";
        return new Response($result);
    }

    public function reportAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
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
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this ->createForm(new ReportingReserveType());

        $qb = $em->createQueryBuilder()
            ->select('reserve')
            ->from("HotelreserveBundle:reserveEntity","reserve")
            ->innerJoin("reserve.customerEntity","customer");

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

                if($data['CodePey']!=null)    $qb = $qb->andWhere('reserve.CodePey = :CodePey')->setParameter('CodePey',$data['CodePey']);
                if($data['Voucher']!=null)    $qb = $qb->andWhere('reserve.Voucher = :Voucher')->setParameter('Voucher',$data['Voucher']);
                if($data['CountNight']!=null) $qb = $qb->andWhere('reserve.CountNight = :CountNight')->setParameter('CountNight',$data['CountNight']);

                if($data['RagencyEntity']!=null) $qb = $qb->andWhere('reserve.hotelEntity = :hotelEntity')->setParameter('hotelEntity',$data['hotelEntity']);

                if($data['RhotelEntity']!=null)
                    $qb = $qb->andWhere('reserve.hotelEntity = :hotelEntity')->setParameter('hotelEntity',$data['RhotelEntity']);
                elseif($data['hotel_city']!=null || $data['hotel_city']!="")
                    $qb = $qb->innerJoin("reserve.hotelEntity","hotel")
                        ->andWhere('hotel.hotel_city = :hotel_city')->setParameter('hotel_city',$data['hotel_city']->getHotelCity());
            }
        }

        $entities = $qb->getQuery()->getResult();

        return $this->render('HotelreserveBundle:Default:AdminSearch.html.twig',array(
            'entities'=>$entities,
            'form' => $form->createView()
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

    public function paymentAction()
    {
        return $this->render('HotelreserveBundle:Default:AgencyPayment.html.twig');
    }
}
