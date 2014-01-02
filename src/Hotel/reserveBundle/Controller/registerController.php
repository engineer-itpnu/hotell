<?php
namespace Hotel\reserveBundle\Controller;

use Hotel\reserveBundle\Entity\userEntity;
use Hotel\reserveBundle\Form\ProfileEditFormType;
use Hotel\reserveBundle\Form\RegistrationFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hotel\reserveBundle\Form\registerType;

class registerController extends Controller
{
    public function indexAction($usertype)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:userEntity');

        $qb= $entities ->createQueryBuilder('u');
        $qb ->where($qb->expr()->like('u.roles', $qb->expr()->literal('%'.$usertype.'%')));
        $entities = $qb->getQuery()->getResult();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb->getQuery(),
            $this->get('request')->query->get('page', 1),
            10
        );
        return $this->render('HotelreserveBundle:register:index.html.twig', array(
            'entities' => $pagination,
        ));
    }

    public function createAction(Request $request)
    {
        $entity  = new userEntity();
        $form = $this->createForm(new RegistrationFormType('Hotel\reserveBundle\Entity\userEntity'), $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->setEnabled(true);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('registerentity_new'));
        }

        return $this->render('HotelreserveBundle:register:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function newAction()
    {
        $entity = new userEntity();
        $form   = $this->createForm(new  RegistrationFormType('Hotel\reserveBundle\Entity\userEntity'), $entity);

        return $this->render('HotelreserveBundle:register:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

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

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:userEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find register entity.');
        }

        $editForm = $this->createForm(new ProfileEditFormType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelreserveBundle:register:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:userEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find register entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProfileEditFormType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            $role = $entity->getRoles();
            return $this->redirect($this->generateUrl('registerentity', array('usertype' => $role[0])));
        }

        return $this->render("HotelreserveBundle:register:edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

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

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
