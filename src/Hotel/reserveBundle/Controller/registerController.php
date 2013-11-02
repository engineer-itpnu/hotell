<?php

namespace Hotel\reserveBundle\Controller;

use Hotel\reserveBundle\Entity\userEntity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hotel\reserveBundle\Form\registerType;

/**
 * register controller.
 *
 */
class registerController extends Controller
{
    /**
     * Lists all register entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:userEntity');

        $qb= $entities ->createQueryBuilder('u');
        $qb ->where($qb->expr()->like('u.roles', $qb->expr()->literal('%ROLE_ADMIN%')));
        $entities = $qb->getQuery()->getResult();

        return $this->render('HotelreserveBundle:register:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new register entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new userEntity();
        $form = $this->createForm(new registerType('Hotel\reserveBundle\Entity\userEntity'), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $sherkat = $this->get('security.context')->getToken()->getUser()->getId();

            $entity->setEnabled(true);
            $entity->setRoles(array("ROLE_ADMIN"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('a_main', array('id' => $entity->getId())));
        }

        return $this->render('HotelreserveBundle:register:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new register entity.
     *
     */
    public function newAction()
    {
        $entity = new userEntity();
        $form   = $this->createForm(new  registerType('Hotel\reserveBundle\Entity\userEntity'), $entity);

        return $this->render('HotelreserveBundle:register:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a register entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:userEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find register entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:register:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing register entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:userEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find register entity.');
        }

        $editForm = $this->createForm(new registerType('Hotel\reserveBundle\Entity\userentity'), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:register:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing register entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:userEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find register entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new registerType('Hotel\reserveBundle\Entity\userentity'), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('userentity_edit', array('id' => $id)));
        }

        return $this->render('HotelreserveBundle:register:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a register entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HotelreserveBundle:userEntity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find register entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('a_main'));
    }

    /**
     * Creates a form to delete a register entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
