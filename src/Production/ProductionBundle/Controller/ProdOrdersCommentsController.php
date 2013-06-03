<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\ProdOrdersComments;
use Production\ProductionBundle\Form\ProdOrdersCommentsType;

/**
 * ProdOrdersComments controller.
 *
 */
class ProdOrdersCommentsController extends Controller
{
    /**
     * Lists all ProdOrdersComments entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:ProdOrdersComments')->findAll();

        return $this->render('ProductionBundle:ProdOrdersComments:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new ProdOrdersComments entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ProdOrdersComments();
        $form = $this->createForm(new ProdOrdersCommentsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodorderscomments_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:ProdOrdersComments:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new ProdOrdersComments entity.
     *
     */
    public function newAction()
    {
        $entity = new ProdOrdersComments();
        $form   = $this->createForm(new ProdOrdersCommentsType(), $entity);

        return $this->render('ProductionBundle:ProdOrdersComments:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProdOrdersComments entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdOrdersComments')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdOrdersComments entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdOrdersComments:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ProdOrdersComments entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdOrdersComments')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdOrdersComments entity.');
        }

        $editForm = $this->createForm(new ProdOrdersCommentsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdOrdersComments:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ProdOrdersComments entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdOrdersComments')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdOrdersComments entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProdOrdersCommentsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodorderscomments_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:ProdOrdersComments:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProdOrdersComments entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:ProdOrdersComments')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProdOrdersComments entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prodorderscomments'));
    }

    /**
     * Creates a form to delete a ProdOrdersComments entity by id.
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
