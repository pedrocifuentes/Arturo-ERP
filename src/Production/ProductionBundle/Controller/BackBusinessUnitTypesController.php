<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\BackBusinessUnitTypes;
use Production\ProductionBundle\Form\BackBusinessUnitTypesType;

/**
 * BackBusinessUnitTypes controller.
 *
 */
class BackBusinessUnitTypesController extends Controller
{
    /**
     * Lists all BackBusinessUnitTypes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:BackBusinessUnitTypes')->findAll();

        return $this->render('ProductionBundle:BackBusinessUnitTypes:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new BackBusinessUnitTypes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new BackBusinessUnitTypes();
        $form = $this->createForm(new BackBusinessUnitTypesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backbusinessunittypes_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:BackBusinessUnitTypes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new BackBusinessUnitTypes entity.
     *
     */
    public function newAction()
    {
        $entity = new BackBusinessUnitTypes();
        $form   = $this->createForm(new BackBusinessUnitTypesType(), $entity);

        return $this->render('ProductionBundle:BackBusinessUnitTypes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BackBusinessUnitTypes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackBusinessUnitTypes')->find($id);       

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackBusinessUnitTypes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackBusinessUnitTypes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing BackBusinessUnitTypes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackBusinessUnitTypes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackBusinessUnitTypes entity.');
        }

        $editForm = $this->createForm(new BackBusinessUnitTypesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackBusinessUnitTypes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing BackBusinessUnitTypes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackBusinessUnitTypes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackBusinessUnitTypes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BackBusinessUnitTypesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backbusinessunittypes_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:BackBusinessUnitTypes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BackBusinessUnitTypes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:BackBusinessUnitTypes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BackBusinessUnitTypes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backbusinessunittypes'));
    }

    /**
     * Creates a form to delete a BackBusinessUnitTypes entity by id.
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
