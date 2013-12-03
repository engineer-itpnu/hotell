<?php

namespace Hotel\reserveBundle\Controller;

use Hotel\reserveBundle\Entity\accountEntity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Hotel\reserveBundle\Entity\moneyEntity;
use Hotel\reserveBundle\Form\moneyEntityType;

class moneyEntityController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        if($this->getUser()->hasRole('ROLE_ADMIN'))
        {
            $entities = $em->getRepository('HotelreserveBundle:moneyEntity')->findAll();
        }
        else
        {
            $entities = $em->getRepository('HotelreserveBundle:moneyEntity')->findBy(array("userEntity"=>$this->getUser()));
        }
//        $convertor = $this->get('my_date_convert');

//        var_dump($convertor->MiladiToShamsi(new \DateTime()));
//
//        var_dump($convertor->ShamsiToMiladi("1392/8/18"));
////        var_dump($jalaliDatetime->gregorianToJalali(2013, 11, 9)); // Convert gregorian date to jalali
////        $jalaliDatetime->jalaliToGregorian(1392, 11, 4); // Convert jalali date to gregorian
////        $jalaliDatetime->jalaliToJd(1392, 11, 4); // Convert jalali date to julian
////        $jalaliDatetime->jalaliToTimestamp(1392, 11, 4); // Getting timestamp of jalali date
//
//        die();

        return $this->render('HotelreserveBundle:moneyEntity:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function createAction(Request $request)
    {
        $entity = new moneyEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setMoneyType($this->getUser()->hasRole('ROLE_HOTELDAR')?0:1);
            $entity->setMoneyDateReq(new \DateTime());
            $entity->setMoneyStatus(1);
            $entity->setUserEntity($this->getUser());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('moneyentity'));
        }

        return $this->render('HotelreserveBundle:moneyEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    private function createCreateForm(moneyEntity $entity)
    {
        $form = $this->createForm(new moneyEntityType($this->getUser()), $entity, array(
            'action' => $this->generateUrl('moneyentity_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    public function newAction()
    {
        $entity = new moneyEntity();
        $form   = $this->createCreateForm($entity);

        return $this->render('HotelreserveBundle:moneyEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HotelreserveBundle:moneyEntity')->find($id);
        $entity->setMoneyStatus(3);
        $em->flush();
        return $this->redirect($this->generateUrl("moneyentity"));
    }

    public function rejectAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HotelreserveBundle:moneyEntity')->find($id);
        $entity->setMoneyStatus(4);
        $entity->setMoneyDateReply(new \DateTime());
        $em->flush();
        return $this->redirect($this->generateUrl("moneyentity"));
    }

    public function acceptAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HotelreserveBundle:moneyEntity')->find($id);
        $entity->setMoneyStatus(2);

        if($entity->getUserEntity()->hasRole('ROLE_HOTELDAR'))
            $lastAccount  = $em->getRepository('HotelreserveBundle:accountEntity')->findOneBy(array("hotelEntity"=>$entity->getHotelEntity()),array("id"=>"desc"));
        else
            $lastAccount = $em->getRepository('HotelreserveBundle:accountEntity')->findOneBy(array("agencyEntity"=>$entity->getUserEntity()->getAgencyEntity()),array("id"=>"desc"));

        $account = new accountEntity();
        $account->setPrice($entity->getMoneyPrice());
        $account->setDateTime(new \DateTime());
        if($entity->getUserEntity()->hasRole('ROLE_HOTELDAR'))
        {
            if($lastAccount == null || $lastAccount->getStockHotel()== 0)
                return $this->forward("HotelreserveBundle:moneyEntity:reject",array('id'=>$id));
            $account->setHotelEntity($entity->getHotelEntity());
            $account->setType(2);
            $account->setStockHotel($lastAccount->getStockHotel() - $entity->getMoneyPrice());
        }
        else
        {
            $account->setAgencyEntity($entity->getUserEntity()->getAgencyEntity());
            $account->setType(3);
            if($lastAccount != null)
                $account->setStockAgency($lastAccount->getStockAgency() + $entity->getMoneyPrice());
            else
                $account->setStockAgency(0 + $entity->getMoneyPrice());
        }
        $em->persist($account);
        $em->flush();
        return $this->redirect($this->generateUrl("moneyentity"));
    }
}
