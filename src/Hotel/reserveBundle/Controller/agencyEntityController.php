<?php

namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Hotel\reserveBundle\Entity\agencyEntity;
use Hotel\reserveBundle\Form\agencyEntityType;

/**
 * agencyEntity controller.
 *
 */
class agencyEntityController extends Controller
{

    /**
     * Lists all agencyEntity entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:agencyEntity')->findAll();

        return $this->render('HotelreserveBundle:agencyEntity:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new agencyEntity entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new agencyEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('agencyentity_show', array('id' => $entity->getId())));
        }

        return $this->render('HotelreserveBundle:agencyEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a agencyEntity entity.
    *
    * @param agencyEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(agencyEntity $entity)
    {
        $form = $this->createForm(new agencyEntityType(), $entity, array(
            'action' => $this->generateUrl('agencyentity_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new agencyEntity entity.
     *
     */
    public function newAction()
    {
        $entity = new agencyEntity();
        $form   = $this->createCreateForm($entity);

        return $this->render('HotelreserveBundle:agencyEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a agencyEntity entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:agencyEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find agencyEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:agencyEntity:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing agencyEntity entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:agencyEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find agencyEntity entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:agencyEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a agencyEntity entity.
    *
    * @param agencyEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(agencyEntity $entity)
    {
        $form = $this->createForm(new agencyEntityType($entity->getUserEntity()), $entity, array(
            'action' => $this->generateUrl('agencyentity_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing agencyEntity entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:agencyEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find agencyEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('agencyentity_edit', array('id' => $id)));
        }

        return $this->render('HotelreserveBundle:agencyEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a agencyEntity entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HotelreserveBundle:agencyEntity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find agencyEntity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('a_main'));
    }

    /**
     * Creates a form to delete a agencyEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agencyentity_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
