<?php
namespace Hotel\reserveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    public function indexAction()
    {
        $server = new \SoapServer('hotels.wsdl');
        $server->setObject($this->get('hotel_service'));

        $responseXml = new Response();
        $responseXml->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $responseXml->setContent(ob_get_clean());

        return $responseXml->getContent()!=null?$responseXml:new Response('Please use <b>/hotelService?wsdl</b> for address to wsdl.');
    }
}