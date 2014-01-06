<?php
namespace Hotel\reserveBundle\Controller;

use Doctrine\ORM\EntityRepository;
use Hotel\reserveBundle\Entity\blankEntity;
use Hotel\reserveBundle\Entity\roomEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class HotelMonitoringController extends Controller
{
    public function indexAction(Request $request)
    {
        $date_convert = $this->get("my_date_convert");
        $now = explode("/",$date_convert->MiladiToShamsi(new \DateTime()));
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();
        $form = $this->get('form.factory')->createNamedBuilder(null, 'form',array('hotel'=>'0','month'=>$now[1],'year'=>$now[0]), array('method' => 'GET','csrf_protection' => false))
            ->add("hotel","entity",array(
                'class' => 'HotelreserveBundle:hotelEntity',
                'property' => 'hotel_name',
                'query_builder' => function(EntityRepository $er) use ($user) {
                        return $er->createQueryBuilder('u')
                            ->where("u.hotel_active = :true")->setParameter("true",true)
                            ->andWhere("u.userEntity = :user")->setParameter("user",$user);
                    }))
            ->add("year","integer",array('constraints' => array(
                new NotBlank(),
                new Range(array('min' => 1380,'max' => 1500))
            )))
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

        $form->handleRequest($request);

        $hotelid = null;
        $javaScripts = "";
        if($form->isValid())
        {
            $data = $form->getData();
            $hotel = $data['hotel'];

            $fromdate = $date_convert->ShamsiToMiladi($data['year']."/".$data['month']."/0");

            $lastdayMonth = $data['month']>6?30:31;
            if($data['month'] == 12 && !$date_convert->isLeap($data['year'])) $lastdayMonth = 29;
            $todate = $date_convert->ShamsiToMiladi($data['year']."/".$data['month']."/".$lastdayMonth);

            $qb = $em->createQueryBuilder()
                ->select("room","blank")
                ->from("HotelreserveBundle:roomEntity","room")
                ->leftJoin("room.blankEntities","blank","WITH", "blank.dateIN >= :fromdate and blank.dateIN <= :todate")
                ->setParameter("fromdate",$fromdate)->setParameter("todate",$todate)
                ->where("room.hotelEntity = :hotel")->setParameter("hotel",$hotel)
                ->orderBy("blank.dateIN","ASC")
                ->orderBy("room.room_type","ASC")
            ;
            $rooms = $qb->getQuery()->getResult();
            $hotelid = $hotel->getId();
            $weekDay = $date_convert->getWeekDayNumber($data['year']."/".$data['month']."/1");

            $javaScripts .= "timeline_header(true, $weekDay);\n";
            foreach($rooms as $room)
                $javaScripts .= $this->getStatusRoomInMonth($room,false)."\n";

        }

        return $this->render('HotelreserveBundle:hotel_monitoring:index.html.twig',array(
            'form' => $form->createView(),
            'year' => $request->get('year'),
            'month' => $request->get('month'),
            'hotelid' => $hotelid,
            'javaScripts' => $javaScripts
        ));
    }

    public function editAction(Request $request,$hotelid, $year, $month)
    {
        $dateconvertor = $this->get("my_date_convert");
        $em = $this->getDoctrine()->getManager();

        $hotel = $em->getRepository("HotelreserveBundle:hotelEntity")->find($hotelid);
        $user = $this->getUser();
        if($hotel == null || $hotel->getUserEntity()!=$user)
            return $this->redirect($this->generateUrl("hotel_monitoring_index"));

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

            return $this->redirect($this->generateUrl("hotel_monitoring_index")."?hotel=$hotelid&month=$month&year=$year");
        }

        $fromdate = $dateconvertor->ShamsiToMiladi($year."/".$month."/0");

        $lastdayMonth = $month>6?30:31;
        if($month == 12 && !$dateconvertor->isLeap($year)) $lastdayMonth = 29;
        $todate = $dateconvertor->ShamsiToMiladi($year."/".$month."/".$lastdayMonth);

        $qb = $em->createQueryBuilder()
            ->select("room","blank")
            ->from("HotelreserveBundle:roomEntity","room")
            ->leftJoin("room.blankEntities","blank","WITH", "blank.dateIN >= :fromdate and blank.dateIN <= :todate")
            ->setParameter("fromdate",$fromdate)->setParameter("todate",$todate)
            ->where("room.hotelEntity = :hotel")->setParameter("hotel",$hotel)
            ->orderBy("blank.dateIN","ASC")
            ->orderBy("room.room_type","ASC")
        ;
        $rooms = $qb->getQuery()->getResult();

        $weekDay = $dateconvertor->getWeekDayNumber($year."/".$month."/1");

        $javaScripts = "timeline_header(true, $weekDay);\n";
        foreach($rooms as $room)
            $javaScripts .= $this->getStatusRoomInMonth($room,true)."\n";

        return $this->render('HotelreserveBundle:hotel_monitoring:edit.html.twig',array(
            'year' => $year,
            'month' => $month,
            'hotelid' => $hotelid,
            'javaScripts' => $javaScripts
        ));
    }

    public function getStatusRoomInMonth(roomEntity $room,$editable)
    {
        $dateconvertor = $this->get("my_date_convert");

        $roomTypes = ServiceController::roomTypes();

        if($editable == false)
            $result = "timeline_add_row_notEdit(".$room->getId().",'".$room->getRoomName()."','".$roomTypes[$room->getRoomType()]."', [";
        else
            $result = "timeline_add_row(".$room->getId().",'".$room->getRoomName()."','".$roomTypes[$room->getRoomType()]."', [";

        $blanks = $room->getBlankEntities();

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

        return $result;
    }
}
