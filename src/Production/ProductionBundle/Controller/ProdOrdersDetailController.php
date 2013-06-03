<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\ProdOrdersDetail;
use Production\ProductionBundle\Form\ProdOrdersDetailType;

/**
 * ProdOrdersDetail controller.
 *
 */
class ProdOrdersDetailController extends Controller
{
    /**
     * Lists all ProdOrdersDetail entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:ProdOrdersDetail')->findAll();

        return $this->render('ProductionBundle:ProdOrdersDetail:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new ProdOrdersDetail entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ProdOrdersDetail();
        $form = $this->createForm(new ProdOrdersDetailType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodordersdetail_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:ProdOrdersDetail:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new ProdOrdersDetail entity.
     *
     */
    public function newAction()
    {
        $entity = new ProdOrdersDetail();
        $form   = $this->createForm(new ProdOrdersDetailType(), $entity);

        return $this->render('ProductionBundle:ProdOrdersDetail:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProdOrdersDetail entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdOrdersDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdOrdersDetail entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdOrdersDetail:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ProdOrdersDetail entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdOrdersDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdOrdersDetail entity.');
        }

        $editForm = $this->createForm(new ProdOrdersDetailType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdOrdersDetail:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ProdOrdersDetail entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdOrdersDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdOrdersDetail entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProdOrdersDetailType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodordersdetail_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:ProdOrdersDetail:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProdOrdersDetail entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:ProdOrdersDetail')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProdOrdersDetail entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prodordersdetail'));
    }

    /**
     * Creates a form to delete a ProdOrdersDetail entity by id.
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
