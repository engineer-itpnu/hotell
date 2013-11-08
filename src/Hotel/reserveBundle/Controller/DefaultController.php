<?php

namespace Hotel\reserveBundle\Controller;

use Hotel\reserveBundle\Entity\accountEntity;
use Hotel\reserveBundle\Form\reportingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function mainAction()
    {
        return $this->render('HotelreserveBundle::index.html.twig');
    }
    public function indexAction()
    {
        return $this->render('HotelreserveBundle:Default:index.html.twig');
    }
    public function reportAction(Request $request)
    {

        $form = $this ->createForm(new reportingType());
//        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $entities = $em ->getRepository("HotelreserveBundle:accountEntity")->findAll();


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
