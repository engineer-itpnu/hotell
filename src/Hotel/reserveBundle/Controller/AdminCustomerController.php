<?php
namespace Hotel\reserveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hotel\reserveBundle\Form\customerEntityType;

class AdminCustomerController extends Controller
{
    public function indexAction()
    {
        $page = $this->getRequest()->get("page", $this->getRequest()->getSession()->get("customer_page",1));
        $this->getRequest()->getSession()->set("customer_page",$page);

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelreserveBundle:customerEntity')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $page,
            10
        );

        return $this->render('HotelreserveBundle:admin_customer:index.html.twig', array(
            'entities' => $pagination,
        ));
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:customerEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find customerEntity entity.');
        }

        $editForm = $this->createForm(new customerEntityType(), $entity);

        if($request->isMethod("post"))
        {
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $em->flush();

                return $this->redirect($this->generateUrl('admin_customer_index', array('id' => $id)));
            }
        }

        return $this->render('HotelreserveBundle:admin_customer:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        ));
    }
}
