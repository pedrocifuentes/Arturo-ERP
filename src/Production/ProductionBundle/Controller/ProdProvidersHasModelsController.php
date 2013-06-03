<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\ProdProvidersHasModels;
use Production\ProductionBundle\Form\ProdProvidersHasModelsType;

/**
 * ProdProvidersHasModels controller.
 *
 */
class ProdProvidersHasModelsController extends Controller
{
    /**
     * Lists all ProdProvidersHasModels entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:ProdProvidersHasModels')->findAll();

        return $this->render('ProductionBundle:ProdProvidersHasModels:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new ProdProvidersHasModels entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ProdProvidersHasModels();
        $form = $this->createForm(new ProdProvidersHasModelsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodprovidershasmodels_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:ProdProvidersHasModels:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new ProdProvidersHasModels entity.
     *
     */
    public function newAction()
    {
        $entity = new ProdProvidersHasModels();
        $form   = $this->createForm(new ProdProvidersHasModelsType(), $entity);

        return $this->render('ProductionBundle:ProdProvidersHasModels:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProdProvidersHasModels entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdProvidersHasModels')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdProvidersHasModels entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdProvidersHasModels:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ProdProvidersHasModels entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdProvidersHasModels')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdProvidersHasModels entity.');
        }

        $editForm = $this->createForm(new ProdProvidersHasModelsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdProvidersHasModels:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ProdProvidersHasModels entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdProvidersHasModels')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdProvidersHasModels entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProdProvidersHasModelsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodprovidershasmodels_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:ProdProvidersHasModels:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProdProvidersHasModels entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:ProdProvidersHasModels')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProdProvidersHasModels entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prodprovidershasmodels'));
    }

    /**
     * Creates a form to delete a ProdProvidersHasModels entity by id.
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
