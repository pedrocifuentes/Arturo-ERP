<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\BackModels;
use Production\ProductionBundle\Form\BackModelsType;

/**
 * BackModels controller.
 *
 */
class BackModelsController extends Controller
{
    /**
     * Lists all BackModels entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:BackModels')->findAll();

        return $this->render('ProductionBundle:BackModels:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new BackModels entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new BackModels();
        $form = $this->createForm(new BackModelsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backmodels_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:BackModels:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new BackModels entity.
     *
     */
    public function newAction()
    {
        $entity = new BackModels();
        $sizes = $em->getRepository('ProductionBundle:BackSizes')->findAll();
        
        $form   = $this->createForm(new BackModelsType(), array_merge($entity, $sizes));

        return $this->render('ProductionBundle:BackModels:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BackModels entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackModels')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackModels entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackModels:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing BackModels entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackModels')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackModels entity.');
        }

        $editForm = $this->createForm(new BackModelsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackModels:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing BackModels entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackModels')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackModels entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BackModelsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backmodels_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:BackModels:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BackModels entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:BackModels')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BackModels entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backmodels'));
    }

    /**
     * Creates a form to delete a BackModels entity by id.
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
