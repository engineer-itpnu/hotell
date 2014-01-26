<?php
namespace Hotel\reserveBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hotel\reserveBundle\Entity\roomEntity;
use Hotel\reserveBundle\Form\roomEntityType;

class AdminRoomController extends Controller
{
    public function indexAction($hotel_id)
    {
        $page = $this->getRequest()->get("page", $this->getRequest()->getSession()->get("room_page",1));
        $this->getRequest()->getSession()->set("room_page",$page);

        $em = $this->getDoctrine()->getManager();
        $hotel = $em->getRepository('HotelreserveBundle:hotelEntity')->find($hotel_id);

        if(!$hotel)
            throw $this->createNotFoundException('Unable to find hotel entity.');

        $entities = $hotel->getRoomEntities();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $page,
            10
        );

        return $this->render('HotelreserveBundle:admin_room:index.html.twig', array(
            'entities' => $pagination,
            'hotel_id' => $hotel_id
        ));
    }

    public function newAction(Request $request,$hotel_id)
    {
        $em = $this->getDoctrine()->getManager();

        $hotel = $em->getRepository('HotelreserveBundle:hotelEntity')->find($hotel_id);
        if(!$hotel)
            throw $this->createNotFoundException('Unable to find hotel entity.');

        $entity = new roomEntity();
        $form = $this->createForm(new roomEntityType(), $entity);

        if($request->isMethod("post"))
        {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $entity->setHotelEntity($hotel);
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('admin_room_index', array('hotel_id'=>$hotel_id)));
            }
        }

        return $this->render('HotelreserveBundle:admin_room:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'hotel_id' => $hotel_id
        ));
    }

    public function editAction(Request $request, $id,$hotel_id)
    {
        $em = $this->getDoctrine()->getManager();

        $hotel = $em->getRepository('HotelreserveBundle:hotelEntity')->find($hotel_id);
        if(!$hotel)
            throw $this->createNotFoundException('Unable to find hotel entity.');

        $entity = $em->getRepository('HotelreserveBundle:roomEntity')->find($id);
        if (!$entity)
            throw $this->createNotFoundException('Unable to find roomEntity entity.');

        $editForm = $this->createForm(new roomEntityType(), $entity);

        if($request->isMethod("post"))
        {
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $em->flush();

                return $this->redirect($this->generateUrl('admin_room_index', array('hotel_id'=>$hotel_id)));
            }
        }

        return $this->render('HotelreserveBundle:admin_room:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'hotel_id'    => $hotel_id
        ));
    }

    public function deleteAction($id,$hotel_id)
    {
        $em = $this->getDoctrine()->getManager();

        $hotel = $em->getRepository('HotelreserveBundle:hotelEntity')->find($hotel_id);
        if(!$hotel)
            throw $this->createNotFoundException('Unable to find hotel entity.');

        $entity = $em->getRepository('HotelreserveBundle:roomEntity')->find($id);
        if (!$entity)
            throw $this->createNotFoundException('Unable to find roomEntity entity.');

        foreach($entity->getBlankEntities() as $blank)
            $em->remove($blank);

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_room_index',array('hotel_id'=>$hotel_id)));
    }
}
