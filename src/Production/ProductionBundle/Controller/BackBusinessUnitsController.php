<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\BackBusinessUnits;
use Production\ProductionBundle\Form\BackBusinessUnitsType;

/**
 * BackBusinessUnits controller.
 *
 */
class BackBusinessUnitsController extends Controller
{
    /**
     * Lists all BackBusinessUnits entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:BackBusinessUnits')->findAll();

        return $this->render('ProductionBundle:BackBusinessUnits:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new BackBusinessUnits entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new BackBusinessUnits();
        $form = $this->createForm(new BackBusinessUnitsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backbusinessunits_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:BackBusinessUnits:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new BackBusinessUnits entity.
     *
     */
    public function newAction()
    {
        $entity = new BackBusinessUnits();
        $form   = $this->createForm(new BackBusinessUnitsType(), $entity);

        return $this->render('ProductionBundle:BackBusinessUnits:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BackBusinessUnits entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackBusinessUnits')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackBusinessUnits entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackBusinessUnits:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing BackBusinessUnits entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackBusinessUnits')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackBusinessUnits entity.');
        }

        $editForm = $this->createForm(new BackBusinessUnitsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackBusinessUnits:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing BackBusinessUnits entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackBusinessUnits')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackBusinessUnits entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BackBusinessUnitsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backbusinessunits_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:BackBusinessUnits:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BackBusinessUnits entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:BackBusinessUnits')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BackBusinessUnits entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backbusinessunits'));
    }

    /**
     * Creates a form to delete a BackBusinessUnits entity by id.
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
