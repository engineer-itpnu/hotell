<?php
namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hotel\reserveBundle\Entity\moneyEntity;
use Hotel\reserveBundle\Form\moneyEntityType;

class AgencyMoneyController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:moneyEntity')->findBy(array("userEntity"=>$this->getUser()));

        return $this->render('HotelreserveBundle:agency_money:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function newAction(Request $request)
    {
        $entity = new moneyEntity();
        $form = $this->createForm(new moneyEntityType($this->getUser()), $entity);

        if ($request->isMethod("post"))
        {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $entity->setMoneyType(1);
                $entity->setMoneyDateReq(new \DateTime());
                $entity->setMoneyStatus(1);
                $entity->setUserEntity($this->getUser());
                $entity->setMoneyPrice(str_replace(",","",$entity->getMoneyPrice()));
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('agency_money_index'));
            }
        }

        return $this->render('HotelreserveBundle:agency_money:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HotelreserveBundle:moneyEntity')->find($id);

        if($entity->getUserEntity() != $this->getUser())
            throw $this->createNotFoundException('Unable to find entity.');

        if($entity->getMoneyStatus() != 1)
            throw $this->createNotFoundException('Request Answered or Deleted.');

        $entity->setMoneyStatus(3);
        $em->flush();
        return $this->redirect($this->generateUrl("agency_money_index"));
    }

    public function paymentAction()
    {
        return $this->render('HotelreserveBundle:agency_money:payment.html.twig');
    }
}
