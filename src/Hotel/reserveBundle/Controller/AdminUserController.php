<?php
namespace Hotel\reserveBundle\Controller;

use Hotel\reserveBundle\Entity\userEntity;
use Hotel\reserveBundle\Form\RegistrationFormType;
use Hotel\reserveBundle\Form\UserEditFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminUserController extends Controller
{
    public function indexAction($usertype)
    {
        $page = $this->getRequest()->get("page", $this->getRequest()->getSession()->get("user_page",1));
        $this->getRequest()->getSession()->set("user_page",$page);

        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder()
            ->select("user")
            ->from("HotelreserveBundle:userEntity","user")
            ->where('user.roles like :role')->setParameter('role','%'.$usertype.'%');

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb->getQuery(),
            $page,
            10
        );
        return $this->render('HotelreserveBundle:admin_user:index.html.twig', array(
            'entities' => $pagination,
        ));
    }

    public function newAction(Request $request)
    {
        $entity  = new userEntity();
        $form = $this->createForm(new RegistrationFormType('Hotel\reserveBundle\Entity\userEntity'), $entity);

        if($request->isMethod("post"))
        {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $entity->setEnabled(true);
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();

                $roles = $entity->getRoles();
                return $this->redirect($this->generateUrl('admin_user_index',array('usertype'=>$roles[0])));
            }
        }

        return $this->render('HotelreserveBundle:admin_user:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelreserveBundle:userEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find register entity.');
        }

        $editForm = $this->createForm(new UserEditFormType(), $entity);

        if($request->isMethod('post'))
        {
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $em->persist($entity);
                $em->flush();

                $role = $entity->getRoles();
                return $this->redirect($this->generateUrl('admin_user_index', array('usertype' => $role[0])));
            }
        }

        return $this->render("HotelreserveBundle:admin_user:edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
}
