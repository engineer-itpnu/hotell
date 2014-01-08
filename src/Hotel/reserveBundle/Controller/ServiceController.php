<?php
namespace Hotel\reserveBundle\Controller;

use Hotel\reserveBundle\Service\AgencyInfo;
use Hotel\reserveBundle\Service\CustomerInfo;
use Hotel\reserveBundle\Service\HotelService;
use Hotel\reserveBundle\Service\PreReserveRequest;
use Hotel\reserveBundle\Service\PreReserveResponse;
use Hotel\reserveBundle\Service\ReserveRequest;
use Hotel\reserveBundle\Service\ReserveResponse;
use Hotel\reserveBundle\Service\RoomListRequest;
use Hotel\reserveBundle\Service\RoomListResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    public function indexAction()
    {
        try
        {
            $server = new \SoapServer('hotels.wsdl');
            $server->setObject($this->get('hotel_service'));

            $responseXml = new Response();
            $responseXml->headers->set('Content-Type', 'text/xml; charset=utf-8');

            ob_start();
            $server->handle();
            $responseXml->setContent(ob_get_contents ());
            if(strlen($responseXml->getContent())>0) ob_clean ();

            return $responseXml->getContent()!=null?$responseXml:new Response('Please use <b>/hotelService?wsdl</b> for address to wsdl.');
        }
        catch(\Exception $ex)
        {
            HotelService::log($ex->getMessage());
            die($ex->getMessage());
        }
    }

    public function getAction()
    {
        $client = new \SoapClient("http://localhost/hotellre/web/app_dev.php/hotelService?wsdl");

        $result = $client->ListRooms(new RoomListRequest("1390/10/10","2","مشهد",new AgencyInfo("agency","1234")));
        $response = new RoomListResponse();
        HotelService::CopyObject($result,$response);
        return new Response(str_replace(["\n"," "],["<br/>","&nbsp;"],print_r($response,true)));

//        $result = $client->PreReserve(new PreReserveRequest(1,3,"1390/10/10",2,2,new CustomerInfo("a","s","a@s.com","1234","1234"),new AgencyInfo("agency","1234"),null));
//        $response = new PreReserveResponse();
//        HotelService::CopyObject($result,$response);
//        return new Response(str_replace(["\n"," "],["<br/>","&nbsp;"],print_r($response,true)));

//        $result = $client->Reserve(new ReserveRequest("3",new AgencyInfo("mostafa","1234")));
//        $response = new ReserveResponse();
//        HotelService::CopyObject($result,$response);
//        return new Response(str_replace(["\n"," "],["<br/>","&nbsp;"],print_r($response,true)));

    }

    static public function roomTypes()
    {
        return array(
            '1' => 'سوئيت1', '2' => 'سوئيت2', '3' => 'سوئيت3',
            '4' => 'سوئيت vip1', '5' => 'سوئيت vip2', '6' => 'سوئيت vip3',
            '7' => 'سوئيت جونيور1', '8' => 'سوئيت جونيور2', '9' => 'سوئيت جونيور3',
            '10' => 'سوئيت پرزيدنت1', '11' => 'سوئيت پرزيدنت2', '12' => 'سوئيت پرزيدنت3',
            '13' => 'سوئيت رويال1', '14' => 'سوئيت رويال2', '15' => 'سوئيت رويال3',
            '16' => 'سوئيت امپريال1', '17' => 'سوئيت امپريال2', '18' => 'سوئيت امپريال3',
            '19' => 'سوئيت لاکچري1', '20' => 'سوئيت لاکچري2', '21' => 'سوئيت لاکچري3',
            '22' => 'سوئيت دوبلکس1', '23' => 'سوئيت دوبلکس2', '24' => 'سوئيت دوبلکس3',
            '25' => 'سوئيت لوکس1', '26' => 'سوئيت لوکس2', '27' => 'سوئيت لوکس3',
            '28' => 'پرنسس روم1', '29' => 'پرنسس روم2', '30' => 'پرنسس روم3',
            '31' => 'پرزيدنتال1', '32' => 'پرزيدنتال2', '33' => 'پرزيدنتال3',
            '34' => 'تريپل1', '35' => 'تريپل2', '36' => 'تريپل3',
            '37' => 'سينگل1', '38' => 'سينگل2', '39' => 'سينگل3',
            '40' => 'دبل1', '41' => 'دبل2', '42' => 'دبل3',
            '43' => 'کانکت روم1', '44' => 'کانکت روم2', '45' => 'کانکت روم3',
            '46' => 'آپارتمان1', '47' => 'آپارتمان2', '48' => 'آپارتمان3',
            '49' => 'آپارتمان رويال1', '50' => 'آپارتمان رويال2', '51' => 'آپارتمان رويال3'
        );
    }
}