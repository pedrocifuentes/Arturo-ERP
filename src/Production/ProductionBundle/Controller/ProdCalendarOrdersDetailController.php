<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\ProdCalendarOrdersDetail;
use Production\ProductionBundle\Form\ProdCalendarOrdersDetailType;

/**
 * ProdCalendarOrdersDetail controller.
 *
 */
class ProdCalendarOrdersDetailController extends Controller
{
    /**
     * Lists all ProdCalendarOrdersDetail entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:ProdCalendarOrdersDetail')->findAll();

        return $this->render('ProductionBundle:ProdCalendarOrdersDetail:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new ProdCalendarOrdersDetail entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ProdCalendarOrdersDetail();
        $form = $this->createForm(new ProdCalendarOrdersDetailType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodcalendarordersdetail_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:ProdCalendarOrdersDetail:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new ProdCalendarOrdersDetail entity.
     *
     */
    public function newAction()
    {
        $entity = new ProdCalendarOrdersDetail();
        $form   = $this->createForm(new ProdCalendarOrdersDetailType(), $entity);

        return $this->render('ProductionBundle:ProdCalendarOrdersDetail:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProdCalendarOrdersDetail entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdCalendarOrdersDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdCalendarOrdersDetail entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdCalendarOrdersDetail:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ProdCalendarOrdersDetail entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdCalendarOrdersDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdCalendarOrdersDetail entity.');
        }

        $editForm = $this->createForm(new ProdCalendarOrdersDetailType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdCalendarOrdersDetail:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ProdCalendarOrdersDetail entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdCalendarOrdersDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdCalendarOrdersDetail entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProdCalendarOrdersDetailType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodcalendarordersdetail_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:ProdCalendarOrdersDetail:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProdCalendarOrdersDetail entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:ProdCalendarOrdersDetail')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProdCalendarOrdersDetail entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prodcalendarordersdetail'));
    }

    /**
     * Creates a form to delete a ProdCalendarOrdersDetail entity by id.
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
