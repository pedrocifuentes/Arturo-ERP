<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\BackSizes;
use Production\ProductionBundle\Form\BackSizesType;

/**
 * BackSizes controller.
 *
 */
class BackSizesController extends Controller
{
    /**
     * Lists all BackSizes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:BackSizes')->findAll();

        return $this->render('ProductionBundle:BackSizes:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new BackSizes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new BackSizes();
        $form = $this->createForm(new BackSizesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backsizes_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:BackSizes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new BackSizes entity.
     *
     */
    public function newAction()
    {
        $entity = new BackSizes();
        $form   = $this->createForm(new BackSizesType(), $entity);

        return $this->render('ProductionBundle:BackSizes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BackSizes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackSizes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackSizes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackSizes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing BackSizes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackSizes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackSizes entity.');
        }

        $editForm = $this->createForm(new BackSizesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackSizes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing BackSizes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackSizes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackSizes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BackSizesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backsizes_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:BackSizes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BackSizes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:BackSizes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BackSizes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backsizes'));
    }

    /**
     * Creates a form to delete a BackSizes entity by id.
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
