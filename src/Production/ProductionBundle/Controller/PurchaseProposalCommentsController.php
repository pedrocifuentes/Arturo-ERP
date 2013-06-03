<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\PurchaseProposalComments;
use Production\ProductionBundle\Form\PurchaseProposalCommentsType;

/**
 * PurchaseProposalComments controller.
 *
 */
class PurchaseProposalCommentsController extends Controller
{
    /**
     * Lists all PurchaseProposalComments entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:PurchaseProposalComments')->findAll();

        return $this->render('ProductionBundle:PurchaseProposalComments:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new PurchaseProposalComments entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new PurchaseProposalComments();
        $form = $this->createForm(new PurchaseProposalCommentsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('purchaseproposalcomments_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:PurchaseProposalComments:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new PurchaseProposalComments entity.
     *
     */
    public function newAction()
    {
        $entity = new PurchaseProposalComments();
        $form   = $this->createForm(new PurchaseProposalCommentsType(), $entity);

        return $this->render('ProductionBundle:PurchaseProposalComments:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PurchaseProposalComments entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposalComments')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposalComments entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:PurchaseProposalComments:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing PurchaseProposalComments entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposalComments')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposalComments entity.');
        }

        $editForm = $this->createForm(new PurchaseProposalCommentsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:PurchaseProposalComments:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing PurchaseProposalComments entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposalComments')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposalComments entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PurchaseProposalCommentsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('purchaseproposalcomments_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:PurchaseProposalComments:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PurchaseProposalComments entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:PurchaseProposalComments')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PurchaseProposalComments entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('purchaseproposalcomments'));
    }

    /**
     * Creates a form to delete a PurchaseProposalComments entity by id.
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
