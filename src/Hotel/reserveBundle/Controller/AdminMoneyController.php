<?php
namespace Hotel\reserveBundle\Controller;

use Hotel\reserveBundle\Entity\accountEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminMoneyController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:moneyEntity')->findAll();

        return $this->render('HotelreserveBundle:admin_money:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function acceptAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HotelreserveBundle:moneyEntity')->find($id);

        if($entity->getMoneyStatus() != 1)
            throw $this->createNotFoundException('Request Answered or Deleted.');

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
                return $this->forward("HotelreserveBundle:AdminMoney:reject",array('id'=>$id));
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
        return $this->redirect($this->generateUrl("admin_money_index"));
    }

    public function rejectAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HotelreserveBundle:moneyEntity')->find($id);

        if($entity->getMoneyStatus() != 1)
            throw $this->createNotFoundException('Request Answered or Deleted.');

        $entity->setMoneyStatus(4);
        $entity->setMoneyDateReply(new \DateTime());
        $em->flush();
        return $this->redirect($this->generateUrl("admin_money_index"));
    }
}
