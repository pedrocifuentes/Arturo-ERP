<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\BackLanguages;
use Production\ProductionBundle\Form\BackLanguagesType;

/**
 * BackLanguages controller.
 *
 */
class BackLanguagesController extends Controller
{
    /**
     * Lists all BackLanguages entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:BackLanguages')->findAll();

        return $this->render('ProductionBundle:BackLanguages:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new BackLanguages entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new BackLanguages();
        $form = $this->createForm(new BackLanguagesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backlanguages_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:BackLanguages:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new BackLanguages entity.
     *
     */
    public function newAction()
    {
        $entity = new BackLanguages();
        $form   = $this->createForm(new BackLanguagesType(), $entity);

        return $this->render('ProductionBundle:BackLanguages:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BackLanguages entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackLanguages')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackLanguages entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackLanguages:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing BackLanguages entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackLanguages')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackLanguages entity.');
        }

        $editForm = $this->createForm(new BackLanguagesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackLanguages:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing BackLanguages entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackLanguages')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackLanguages entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BackLanguagesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backlanguages_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:BackLanguages:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BackLanguages entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:BackLanguages')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BackLanguages entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backlanguages'));
    }

    /**
     * Creates a form to delete a BackLanguages entity by id.
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
