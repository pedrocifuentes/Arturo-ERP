<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\PurchaseProposalLog;
use Production\ProductionBundle\Form\PurchaseProposalLogType;

/**
 * PurchaseProposalLog controller.
 *
 */
class PurchaseProposalLogController extends Controller
{
    /**
     * Lists all PurchaseProposalLog entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:PurchaseProposalLog')->findAll();

        return $this->render('ProductionBundle:PurchaseProposalLog:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new PurchaseProposalLog entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new PurchaseProposalLog();
        $form = $this->createForm(new PurchaseProposalLogType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('purchaseproposallog_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:PurchaseProposalLog:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new PurchaseProposalLog entity.
     *
     */
    public function newAction()
    {
        $entity = new PurchaseProposalLog();
        $form   = $this->createForm(new PurchaseProposalLogType(), $entity);

        return $this->render('ProductionBundle:PurchaseProposalLog:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PurchaseProposalLog entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposalLog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposalLog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:PurchaseProposalLog:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing PurchaseProposalLog entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposalLog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposalLog entity.');
        }

        $editForm = $this->createForm(new PurchaseProposalLogType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:PurchaseProposalLog:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing PurchaseProposalLog entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposalLog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposalLog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PurchaseProposalLogType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('purchaseproposallog_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:PurchaseProposalLog:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PurchaseProposalLog entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:PurchaseProposalLog')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PurchaseProposalLog entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('purchaseproposallog'));
    }

    /**
     * Creates a form to delete a PurchaseProposalLog entity by id.
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
