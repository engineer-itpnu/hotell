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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:roomEntity')->findAll();

        return $this->render('HotelreserveBundle:roomEntity:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new roomEntity entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new roomEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('roomentity_show', array('id' => $entity->getId())));
        }

        return $this->render('HotelreserveBundle:roomEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a roomEntity entity.
    *
    * @param roomEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(roomEntity $entity)
    {
        $form = $this->createForm(new roomEntityType(), $entity, array(
            'action' => $this->generateUrl('roomentity_new'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new roomEntity entity.
     *
     */
    public function newAction()
    {
        $entity = new roomEntity();
        $form   = $this->createCreateForm($entity);

        return $this->render('HotelreserveBundle:roomEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a roomEntity entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:roomEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find roomEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:roomEntity:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing roomEntity entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:roomEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find roomEntity entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:roomEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a roomEntity entity.
    *
    * @param roomEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(roomEntity $entity)
    {
        $form = $this->createForm(new roomEntityType(), $entity, array(
            'action' => $this->generateUrl('roomentity_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing roomEntity entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:roomEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find roomEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('roomentity_edit', array('id' => $id)));
        }

        return $this->render('HotelreserveBundle:roomEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a roomEntity entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
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

        return $this->redirect($this->generateUrl('def_room'));
    }

    /**
     * Creates a form to delete a roomEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('roomentity_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
