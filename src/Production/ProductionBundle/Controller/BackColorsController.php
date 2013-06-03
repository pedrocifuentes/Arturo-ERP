<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Production\ProductionBundle\Entity\BackColors;
use Production\ProductionBundle\Form\BackColorsType;

/**
 * BackColors controller.
 *
 */
class BackColorsController extends Controller {

    /**
     * Lists all BackColors entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:BackColors')->findAll();

        return $this->render('ProductionBundle:BackColors:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new BackColors entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new BackColors();
        $form = $this->createForm(new BackColorsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);

            //$form['image']->getData()->move($this->getUploadRootDir(), $form['image']->getData()->getClientOriginalName());

            $em->flush();

            return $this->redirect($this->generateUrl('backcolors_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:BackColors:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new BackColors entity.
     *
     */
    public function newAction() {
        $entity = new BackColors();
        $form = $this->createForm(new BackColorsType(), $entity);

        return $this->render('ProductionBundle:BackColors:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BackColors entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackColors')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackColors entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackColors:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing BackColors entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackColors')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackColors entity.');
        }

        $editForm = $this->createForm(new BackColorsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackColors:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing BackColors entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackColors')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackColors entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BackColorsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backcolors_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:BackColors:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BackColors entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:BackColors')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BackColors entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backcolors'));
    }

    /**
     * Creates a form to delete a BackColors entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

}
