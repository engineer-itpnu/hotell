<?php
namespace Hotel\reserveBundle\Controller;

use Hotel\reserveBundle\Service\AgencyInfo;
use Hotel\reserveBundle\Service\HotelService;
use Hotel\reserveBundle\Service\ReserveRequest;
use Hotel\reserveBundle\Service\ReserveResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    public function indexAction()
    {
//        try
//        {
        $server = new \SoapServer('hotels.wsdl');
        $server->setObject($this->get('hotel_service'));

        $responseXml = new Response();
        $responseXml->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $responseXml->setContent(ob_get_clean());

        return $responseXml->getContent()!=null?$responseXml:new Response('Please use <b>/hotelService?wsdl</b> for address to wsdl.');
//        }
//        catch(\Exception $ex)
//        {
//            HotelService::log($ex->getMessage());
//            die($ex->getMessage());
//        }
    }

    public function getAction()
    {
        $client = new \SoapClient("http://localhost/hotellre/web/app_dev.php/hotelService?wsdl");
        $result = $client->Reserve(new ReserveRequest("10",new AgencyInfo("mostafa","1234")));
        $response = new ReserveResponse();
        HotelService::CopyObject($result,$response);
        $balance = $response->balance;
        $Reserve_accept_code = $response->reserve_accept_code;
        $Status = $response->status;
        return new Response("balance = $balance Reserve_accept_code = $Reserve_accept_code Status = $Status");
    }
}