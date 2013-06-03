<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\PurchaseProposalProdProvidersRates;
use Production\ProductionBundle\Form\PurchaseProposalProdProvidersRatesType;

/**
 * PurchaseProposalProdProvidersRates controller.
 *
 */
class PurchaseProposalProdProvidersRatesController extends Controller
{
    /**
     * Lists all PurchaseProposalProdProvidersRates entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:PurchaseProposalProdProvidersRates')->findAll();

        return $this->render('ProductionBundle:PurchaseProposalProdProvidersRates:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new PurchaseProposalProdProvidersRates entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new PurchaseProposalProdProvidersRates();
        $form = $this->createForm(new PurchaseProposalProdProvidersRatesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('purchaseproposalprodprovidersrates_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:PurchaseProposalProdProvidersRates:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new PurchaseProposalProdProvidersRates entity.
     *
     */
    public function newAction()
    {
        $entity = new PurchaseProposalProdProvidersRates();
        $form   = $this->createForm(new PurchaseProposalProdProvidersRatesType(), $entity);

        return $this->render('ProductionBundle:PurchaseProposalProdProvidersRates:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PurchaseProposalProdProvidersRates entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposalProdProvidersRates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposalProdProvidersRates entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:PurchaseProposalProdProvidersRates:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing PurchaseProposalProdProvidersRates entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposalProdProvidersRates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposalProdProvidersRates entity.');
        }

        $editForm = $this->createForm(new PurchaseProposalProdProvidersRatesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:PurchaseProposalProdProvidersRates:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing PurchaseProposalProdProvidersRates entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:PurchaseProposalProdProvidersRates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseProposalProdProvidersRates entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PurchaseProposalProdProvidersRatesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('purchaseproposalprodprovidersrates_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:PurchaseProposalProdProvidersRates:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PurchaseProposalProdProvidersRates entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:PurchaseProposalProdProvidersRates')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PurchaseProposalProdProvidersRates entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('purchaseproposalprodprovidersrates'));
    }

    /**
     * Creates a form to delete a PurchaseProposalProdProvidersRates entity by id.
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
