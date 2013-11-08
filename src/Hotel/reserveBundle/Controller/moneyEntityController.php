<?php

namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Hotel\reserveBundle\Entity\moneyEntity;
use Hotel\reserveBundle\Form\moneyEntityType;

/**
 * moneyEntity controller.
 *
 */
class moneyEntityController extends Controller
{

    /**
     * Lists all moneyEntity entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:moneyEntity')->findAll();

        return $this->render('HotelreserveBundle:moneyEntity:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new moneyEntity entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new moneyEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('moneyentity_show', array('id' => $entity->getId())));
        }

        return $this->render('HotelreserveBundle:moneyEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a moneyEntity entity.
    *
    * @param moneyEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(moneyEntity $entity)
    {
        $form = $this->createForm(new moneyEntityType(), $entity, array(
            'action' => $this->generateUrl('moneyentity_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new moneyEntity entity.
     *
     */
    public function newAction()
    {
        $entity = new moneyEntity();
        $form   = $this->createCreateForm($entity);

        return $this->render('HotelreserveBundle:moneyEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a moneyEntity entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:moneyEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find moneyEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:moneyEntity:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing moneyEntity entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:moneyEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find moneyEntity entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:moneyEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a moneyEntity entity.
    *
    * @param moneyEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(moneyEntity $entity)
    {
        $form = $this->createForm(new moneyEntityType(), $entity, array(
            'action' => $this->generateUrl('moneyentity_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing moneyEntity entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:moneyEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find moneyEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('moneyentity_edit', array('id' => $id)));
        }

        return $this->render('HotelreserveBundle:moneyEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a moneyEntity entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HotelreserveBundle:moneyEntity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find moneyEntity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('moneyentity'));
    }

    /**
     * Creates a form to delete a moneyEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('moneyentity_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
