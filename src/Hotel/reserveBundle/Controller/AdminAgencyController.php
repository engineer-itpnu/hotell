<?php
namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hotel\reserveBundle\Entity\agencyEntity;
use Hotel\reserveBundle\Form\agencyEntityType;

class AdminAgencyController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:agencyEntity')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1),
            10
        );

        return $this->render('HotelreserveBundle:admin_agency:index.html.twig', array(
            'entities' => $pagination,
        ));
    }

    public function newAction(Request $request)
    {
        $entity = new agencyEntity();
        $form = $this->createForm(new agencyEntityType(), $entity);

        if($request->isMethod("post"))
        {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('admin_agency_index'));
            }
        }

        return $this->render('HotelreserveBundle:admin_agency:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:agencyEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find agencyEntity entity.');
        }

        $editForm = $this->createForm(new agencyEntityType($entity->getUserEntity()), $entity);

        if($request->isMethod("post"))
        {
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $em->flush();

                return $this->redirect($this->generateUrl('admin_agency_index'));
            }
        }

        return $this->render('HotelreserveBundle:admin_agency:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        ));
    }
}
