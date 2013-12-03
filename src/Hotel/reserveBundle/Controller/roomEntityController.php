<?php

namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Hotel\reserveBundle\Entity\roomEntity;
use Hotel\reserveBundle\Form\roomEntityType;

/**
 * roomEntity controller.
 *
 */
class roomEntityController extends Controller
{

    /**
     * Lists all roomEntity entities.
     *
     */
    public function indexAction($hotel_id)
    {
        $em = $this->getDoctrine()->getManager();

        $hotel = $em->getRepository('HotelreserveBundle:hotelEntity')->find($hotel_id);

        $entities = $hotel->getRoomEntities();

        return $this->render('HotelreserveBundle:roomEntity:index.html.twig', array(
            'entities' => $entities,
            'hotel_id' => $hotel_id
        ));
    }
    /**
     * Creates a new roomEntity entity.
     *
     */
    public function createAction(Request $request,$hotel_id)
    {
        $entity = new roomEntity();
        $form = $this->createCreateForm($entity,$hotel_id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $hotel = $em->getRepository('HotelreserveBundle:hotelEntity')->find($hotel_id);
            $entity->setHotelEntity($hotel);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('roomentity', array('id' => $entity->getId(),'hotel_id'=>$hotel_id)));
        }

        return $this->render('HotelreserveBundle:roomEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'hotel_id' => $hotel_id
        ));
    }

    /**
    * Creates a form to create a roomEntity entity.
    *
    * @param roomEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(roomEntity $entity,$hotel_id)
    {
        $form = $this->createForm(new roomEntityType(), $entity, array(
            'action' => $this->generateUrl('roomentity_new',array('hotel_id'=>$hotel_id)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new roomEntity entity.
     *
     */
    public function newAction($hotel_id)
    {
        $entity = new roomEntity();
        $form   = $this->createCreateForm($entity,$hotel_id);

        return $this->render('HotelreserveBundle:roomEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'hotel_id' => $hotel_id
        ));
    }

    /**
     * Finds and displays a roomEntity entity.
     *
     */
    public function showAction($id,$hotel_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:roomEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find roomEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id,$hotel_id);

        return $this->render('HotelreserveBundle:roomEntity:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing roomEntity entity.
     *
     */
    public function editAction($id,$hotel_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:roomEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find roomEntity entity.');
        }

        $editForm = $this->createEditForm($entity,$hotel_id);
        $deleteForm = $this->createDeleteForm($id,$hotel_id);

        return $this->render('HotelreserveBundle:roomEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'hotel_id'    => $hotel_id
        ));
    }

    /**
    * Creates a form to edit a roomEntity entity.
    *
    * @param roomEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(roomEntity $entity,$hotel_id)
    {
        $form = $this->createForm(new roomEntityType(), $entity, array(
            'action' => $this->generateUrl('roomentity_update', array('id' => $entity->getId(),'hotel_id'=>$hotel_id)),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing roomEntity entity.
     *
     */
    public function updateAction(Request $request, $id,$hotel_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:roomEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find roomEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id,$hotel_id);
        $editForm = $this->createEditForm($entity,$hotel_id);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('roomentity', array('id' => $id,'hotel_id'=>$hotel_id)));
        }

        return $this->render('HotelreserveBundle:roomEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'hotel_id'    => $hotel_id
        ));
    }
    /**
     * Deletes a roomEntity entity.
     *
     */
    public function deleteAction(Request $request, $id,$hotel_id)
    {
        $form = $this->createDeleteForm($id,$hotel_id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HotelreserveBundle:roomEntity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find roomEntity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('roomentity_new',array('hotel_id'=>$hotel_id)));
    }

    /**
     * Creates a form to delete a roomEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id,$hotel_id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('roomentity_delete', array('id' => $id,'hotel_id'=>$hotel_id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
