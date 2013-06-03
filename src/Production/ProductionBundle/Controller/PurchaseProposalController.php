<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Production\ProductionBundle\Entity\PurchaseProposal;
use Production\ProductionBundle\Form\PurchaseProposalType;

/**
 * PurchaseProposal controller.
 *
 */
class PurchaseProposalController extends Controller {

    /**
     * Lists all PurchaseProposal entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:PurchaseProposal')->findAll();

        return $this->render('ProductionBundle:PurchaseProposal:index.html.twig', array(
                    'entities' => $entities,
                ));
    }

    /**
     * Creates a new PurchaseProposal entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new PurchaseProposal();
        $form = $this->createForm(new PurchaseProposalType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('purchaseproposal_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:PurchaseProposal:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }

    /**
     * Displays a form to create a new PurchaseProposal entity.
     *
     */
    public function newAction() {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('SELECT MAX(pp.id) as noofproposal FROM ProductionBundle:PurchaseProposal pp');
        $noofproposal = $query->getSingleScalarResult();

        $entity = new PurchaseProposal();
        $entity->setDocNo('PROP' . str_pad((int) $noofproposal + 1, 4, "0", STR_PAD_LEFT));
        $entity->setDocDate(new \DateTime());

        $form = $this->createForm(new PurchaseProposalType(), $entity);

        return $this->render('ProductionBundle:PurchaseProposal:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }

    /**
     * Finds and displays a PurchaseProposal entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:PurchaseProposal:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing PurchaseProposal entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposal entity.');
        }

        $editForm = $this->createForm(new PurchaseProposalType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:PurchaseProposal:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Edits an existing PurchaseProposal entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PurchaseProposalType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('purchaseproposal_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:PurchaseProposal:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Deletes a PurchaseProposal entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:PurchaseProposal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PurchaseProposal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('purchaseproposal'));
    }

    /**
     * Creates a form to delete a PurchaseProposal entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

}
