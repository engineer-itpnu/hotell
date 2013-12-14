<?php

namespace Hotel\reserveBundle\Controller;

use Hotel\reserveBundle\Entity\userEntity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Hotel\reserveBundle\Entity\hotelEntity;
use Hotel\reserveBundle\Form\hotelEntityType;

/**
 * hotelEntity controller.
 *
 */
class hotelEntityController extends Controller
{

    /**
     * Lists all hotelEntity entities.
     *
     */
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

    /**
     * Creates a new hotelEntity entity.
     *
     */
    public function createAction(Request $request)
    {
        if (!$this->getUser()->hasRole('ROLE_ADMIN'))
            return $this->redirect($this->generateUrl('hotelentity'));

        $entity = new hotelEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setHotelActive(true);
            $entity->setHotelAddRoomTtariff(str_replace(",","",$entity->getHotelAddRoomTtariff()));
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('hotelentity', array('id' => $entity->getId())));
        }

        return $this->render('HotelreserveBundle:hotelEntity:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a hotelEntity entity.
     *
     * @param hotelEntity $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(hotelEntity $entity)
    {
        $form = $this->createForm(new hotelEntityType(), $entity, array(
            'action' => $this->generateUrl('hotelentity_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new hotelEntity entity.
     *
     */
    public function newAction()
    {
        if (!$this->getUser()->hasRole('ROLE_ADMIN'))
            return $this->redirect($this->generateUrl('hotelentity_new'));

        $entity = new hotelEntity();
        $form = $this->createCreateForm($entity);

        return $this->render('HotelreserveBundle:hotelEntity:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a hotelEntity entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:hotelEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find hotelEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:hotelEntity:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing hotelEntity entity.
     *
     */
    public function editAction($id)
    {
        if (!$this->getUser()->hasRole('ROLE_ADMIN'))
            return $this->redirect($this->generateUrl('hotelentity'));

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:hotelEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find hotelEntity entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:hotelEntity:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a hotelEntity entity.
     *
     * @param hotelEntity $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(hotelEntity $entity)
    {
        $form = $this->createForm(new hotelEntityType(), $entity, array(
            'action' => $this->generateUrl('hotelentity_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing hotelEntity entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        if (!$this->getUser()->hasRole('ROLE_ADMIN'))
            return $this->redirect($this->generateUrl('hotelentity'));

        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('HotelreserveBundle:hotelEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find hotelEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->setHotelAddRoomTtariff(str_replace(",","",$entity->getHotelAddRoomTtariff()));
            $em->flush();

            return $this->redirect($this->generateUrl('hotelentity_edit', array('id' => $id)));
        }

        return $this->render('HotelreserveBundle:hotelEntity:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a hotelEntity entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        if (!$this->getUser()->hasRole('ROLE_ADMIN'))
            return $this->redirect($this->generateUrl('hotelentity'));

        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HotelreserveBundle:hotelEntity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find hotelEntity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('hotelentity'));
    }

    /**
     * Creates a form to delete a hotelEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hotelentity_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
