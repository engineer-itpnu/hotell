<?php
namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hotel\reserveBundle\Entity\hotelEntity;
use Hotel\reserveBundle\Form\hotelEntityType;

class hotelEntityController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder()
            ->select('hotel')
            ->from('HotelreserveBundle:hotelEntity', 'hotel');

        if($this->getUser()->hasRole('ROLE_HOTELDAR'))
        {
            $qb = $qb->where("hotel.userEntity = :user")->setParameter("user",$this->getUser())
                ->andWhere("hotel.hotel_active = 1");
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb->getQuery(),
            $this->get('request')->query->get('page', 1),
            10
        );

        return $this->render('HotelreserveBundle:hotelEntity:index.html.twig', array(
            'entities' => $pagination,
        ));
    }

    public function newAction(Request $request)
    {
        if (!$this->getUser()->hasRole('ROLE_ADMIN'))
            return $this->redirect($this->generateUrl('hotelentity'));

        $entity = new hotelEntity();
        $form = $this->createForm(new hotelEntityType(), $entity);

        if($request->isMethod("post"))
        {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $entity->setHotelActive(true);
                $entity->setHotelAddRoomTtariff(str_replace(",","",$entity->getHotelAddRoomTtariff()));
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('hotelentity'));
            }
        }

        return $this->render('HotelreserveBundle:hotelEntity:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    public function editAction(Request $request, $id)
    {
        if (!$this->getUser()->hasRole('ROLE_ADMIN'))
            return $this->redirect($this->generateUrl('hotelentity'));

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:hotelEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find hotelEntity entity.');
        }

        $editForm = $this->createForm(new hotelEntityType(), $entity);

        if($request->isMethod("post"))
        {
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $entity->setHotelAddRoomTtariff(str_replace(",","",$entity->getHotelAddRoomTtariff()));
                $em->flush();

                return $this->redirect($this->generateUrl('hotelentity'));
            }
        }

        return $this->render('HotelreserveBundle:hotelEntity:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView()
        ));
    }
}
