<?php

namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Hotel\reserveBundle\Entity\masterEntity;
use Hotel\reserveBundle\Form\masterEntityType;

/**
 * masterEntity controller.
 *
 */
class masterEntityController extends Controller
{

    /**
     * Lists all masterEntity entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:masterEntity')->findAll();

        return $this->render('HotelreserveBundle:masterEntity:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new masterEntity entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new masterEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('master_show', array('id' => $entity->getId())));
        }

        return $this->render('HotelreserveBundle:masterEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a masterEntity entity.
    *
    * @param masterEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(masterEntity $entity)
    {
        $form = $this->createForm(new masterEntityType(), $entity, array(
            'action' => $this->generateUrl('master_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new masterEntity entity.
     *
     */
    public function newAction()
    {
        $entity = new masterEntity();
        $form   = $this->createCreateForm($entity);

        return $this->render('HotelreserveBundle:masterEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a masterEntity entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:masterEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find masterEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:masterEntity:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing masterEntity entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:masterEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find masterEntity entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:masterEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a masterEntity entity.
    *
    * @param masterEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(masterEntity $entity)
    {
        $form = $this->createForm(new masterEntityType(), $entity, array(
            'action' => $this->generateUrl('master_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing masterEntity entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:masterEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find masterEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('master_edit', array('id' => $id)));
        }

        return $this->render('HotelreserveBundle:masterEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a masterEntity entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HotelreserveBundle:masterEntity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find masterEntity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('master'));
    }

    /**
     * Creates a form to delete a masterEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('master_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
