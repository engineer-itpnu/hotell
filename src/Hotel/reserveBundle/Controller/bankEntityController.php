<?php

namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Hotel\reserveBundle\Entity\bankEntity;
use Hotel\reserveBundle\Form\bankEntityType;

/**
 * bankEntity controller.
 *
 */
class bankEntityController extends Controller
{

    /**
     * Lists all bankEntity entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:bankEntity')->findAll();

        return $this->render('HotelreserveBundle:bankEntity:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new bankEntity entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new bankEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bankentity_show', array('id' => $entity->getId())));
        }

        return $this->render('HotelreserveBundle:bankEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a bankEntity entity.
    *
    * @param bankEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(bankEntity $entity)
    {
        $form = $this->createForm(new bankEntityType(), $entity, array(
            'action' => $this->generateUrl('bankentity_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new bankEntity entity.
     *
     */
    public function newAction()
    {
        $entity = new bankEntity();
        $form   = $this->createCreateForm($entity);

        return $this->render('HotelreserveBundle:bankEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bankEntity entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:bankEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find bankEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:bankEntity:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing bankEntity entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:bankEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find bankEntity entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:bankEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a bankEntity entity.
    *
    * @param bankEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(bankEntity $entity)
    {
        $form = $this->createForm(new bankEntityType(), $entity, array(
            'action' => $this->generateUrl('bankentity_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing bankEntity entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:bankEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find bankEntity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('bankentity_edit', array('id' => $id)));
        }

        return $this->render('HotelreserveBundle:bankEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a bankEntity entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HotelreserveBundle:bankEntity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find bankEntity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bankentity'));
    }

    /**
     * Creates a form to delete a bankEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bankentity_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
