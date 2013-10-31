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

        $entities = $em->getRepository('farnazhmonshiBundle:user');

        $qb= $entities ->createQueryBuilder('u');
        $qb ->where($qb->expr()->like('u.roles', $qb->expr()->literal('%ROLE_MONSHI%')));
        $entities = $qb->getQuery()->getResult();

        return $this->render('farnazhmonshiBundle:monshi:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new monshi entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new user();
        $form = $this->createForm(new monshiType('farnazh\monshiBundle\Entity\user'), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $sherkat = $this->get('security.context')->getToken()->getUser()->getSherkat();

            $entity->setEnabled(true);
            $entity->setRoles(array("ROLE_MONSHI"));
            $entity->setSherkat($sherkat);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('monshi', array('id' => $entity->getId())));
        }

        return $this->render('farnazhmonshiBundle:monshi:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new monshi entity.
     *
     */
    public function newAction()
    {
        $entity = new user();
        $form   = $this->createForm(new monshiType('farnazh\monshiBundle\Entity\user'), $entity);

        return $this->render('farnazhmonshiBundle:monshi:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a monshi entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('farnazhmonshiBundle:user')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find monshi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('farnazhmonshiBundle:monshi:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing monshi entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('farnazhmonshiBundle:user')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find monshi entity.');
        }

        $editForm = $this->createForm(new monshiType('farnazh\monshiBundle\Entity\user'), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('farnazhmonshiBundle:monshi:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing monshi entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('farnazhmonshiBundle:user')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find monshi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new monshiType('farnazh\monshiBundle\Entity\user'), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('monshi_edit', array('id' => $id)));
        }

        return $this->render('farnazhmonshiBundle:monshi:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a monshi entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('farnazhmonshiBundle:user')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find monshi entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('monshi'));
    }

    /**
     * Creates a form to delete a monshi entity by id.
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
