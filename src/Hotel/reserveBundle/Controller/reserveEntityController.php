<?php

namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Hotel\reserveBundle\Entity\reserveEntity;
use Hotel\reserveBundle\Form\reserveEntityType;

/**
 * reserveEntity controller.
 *
 */
class reserveEntityController extends Controller
{

    /**
     * Lists all reserveEntity entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:reserveEntity')->findAll();

        return $this->render('HotelreserveBundle:reserveEntity:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new reserveEntity entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new reserveEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reserve_show', array('id' => $entity->getId())));
        }

        return $this->render('HotelreserveBundle:reserveEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a reserveEntity entity.
    *
    * @param reserveEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(reserveEntity $entity)
    {
        $form = $this->createForm(new reserveEntityType(), $entity, array(
            'action' => $this->generateUrl('reserve_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new reserveEntity entity.
     *
     */
    public function newAction()
    {
        $entity = new reserveEntity();
        $form   = $this->createCreateForm($entity);

        return $this->render('HotelreserveBundle:reserveEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reserveEntity entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:reserveEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find reserveEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:reserveEntity:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing reserveEntity entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:reserveEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find reserveEntity entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:reserveEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a reserveEntity entity.
    *
    * @param reserveEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(reserveEntity $entity)
    {
        $form = $this->createForm(new reserveEntityType(), $entity, array(
            'action' => $this->generateUrl('reserve_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing reserveEntity entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:reserveEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find reserveEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reserve_edit', array('id' => $id)));
        }

        return $this->render('HotelreserveBundle:reserveEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a reserveEntity entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HotelreserveBundle:reserveEntity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find reserveEntity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reserve'));
    }

    /**
     * Creates a form to delete a reserveEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reserve_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
