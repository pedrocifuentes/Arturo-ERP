<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\ProdPricesDetail;
use Production\ProductionBundle\Form\ProdPricesDetailType;

/**
 * ProdPricesDetail controller.
 *
 */
class ProdPricesDetailController extends Controller
{
    /**
     * Lists all ProdPricesDetail entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:ProdPricesDetail')->findAll();

        return $this->render('ProductionBundle:ProdPricesDetail:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new ProdPricesDetail entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ProdPricesDetail();
        $form = $this->createForm(new ProdPricesDetailType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodpricesdetail_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:ProdPricesDetail:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new ProdPricesDetail entity.
     *
     */
    public function newAction()
    {
        $entity = new ProdPricesDetail();
        $form   = $this->createForm(new ProdPricesDetailType(), $entity);

        return $this->render('ProductionBundle:ProdPricesDetail:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProdPricesDetail entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdPricesDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdPricesDetail entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdPricesDetail:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ProdPricesDetail entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdPricesDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdPricesDetail entity.');
        }

        $editForm = $this->createForm(new ProdPricesDetailType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdPricesDetail:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ProdPricesDetail entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdPricesDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdPricesDetail entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProdPricesDetailType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodpricesdetail_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:ProdPricesDetail:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProdPricesDetail entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:ProdPricesDetail')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProdPricesDetail entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prodpricesdetail'));
    }

    /**
     * Creates a form to delete a ProdPricesDetail entity by id.
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
