<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\Combination;
use Production\ProductionBundle\Form\CombinationType;

/**
 * Combination controller.
 *
 */
class CombinationController extends Controller
{
    /**
     * Lists all Combination entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:Combination')->findAll();

        return $this->render('ProductionBundle:Combination:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Combination entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Combination();
        $form = $this->createForm(new CombinationType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('combination_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:Combination:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Combination entity.
     *
     */
    public function newAction()
    {
        $entity = new Combination();
        $form   = $this->createForm(new CombinationType(), $entity);

        return $this->render('ProductionBundle:Combination:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Combination entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:Combination')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Combination entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:Combination:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Combination entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:Combination')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Combination entity.');
        }

        $editForm = $this->createForm(new CombinationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:Combination:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Combination entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:Combination')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Combination entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CombinationType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('combination_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:Combination:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Combination entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:Combination')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Combination entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('combination'));
    }

    /**
     * Creates a form to delete a Combination entity by id.
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
