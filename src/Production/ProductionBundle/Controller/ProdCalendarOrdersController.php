<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\ProdCalendarOrders;
use Production\ProductionBundle\Form\ProdCalendarOrdersType;

/**
 * ProdCalendarOrders controller.
 *
 */
class ProdCalendarOrdersController extends Controller
{
    /**
     * Lists all ProdCalendarOrders entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:ProdCalendarOrders')->findAll();

        return $this->render('ProductionBundle:ProdCalendarOrders:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new ProdCalendarOrders entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ProdCalendarOrders();
        $form = $this->createForm(new ProdCalendarOrdersType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodcalendarorders_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:ProdCalendarOrders:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new ProdCalendarOrders entity.
     *
     */
    public function newAction()
    {
        $entity = new ProdCalendarOrders();
        $form   = $this->createForm(new ProdCalendarOrdersType(), $entity);

        return $this->render('ProductionBundle:ProdCalendarOrders:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProdCalendarOrders entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdCalendarOrders')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdCalendarOrders entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdCalendarOrders:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ProdCalendarOrders entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdCalendarOrders')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdCalendarOrders entity.');
        }

        $editForm = $this->createForm(new ProdCalendarOrdersType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdCalendarOrders:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ProdCalendarOrders entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdCalendarOrders')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdCalendarOrders entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProdCalendarOrdersType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodcalendarorders_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:ProdCalendarOrders:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProdCalendarOrders entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:ProdCalendarOrders')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProdCalendarOrders entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prodcalendarorders'));
    }

    /**
     * Creates a form to delete a ProdCalendarOrders entity by id.
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
