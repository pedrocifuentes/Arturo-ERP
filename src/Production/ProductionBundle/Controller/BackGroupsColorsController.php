<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\BackGroupsColors;
use Production\ProductionBundle\Form\BackGroupsColorsType;

/**
 * BackGroupsColors controller.
 *
 */
class BackGroupsColorsController extends Controller
{
    /**
     * Lists all BackGroupsColors entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:BackGroupsColors')->findAll();

        return $this->render('ProductionBundle:BackGroupsColors:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new BackGroupsColors entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new BackGroupsColors();
        $form = $this->createForm(new BackGroupsColorsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backgroupscolors_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:BackGroupsColors:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new BackGroupsColors entity.
     *
     */
    public function newAction()
    {
        $entity = new BackGroupsColors();
        $form   = $this->createForm(new BackGroupsColorsType(), $entity);

        return $this->render('ProductionBundle:BackGroupsColors:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BackGroupsColors entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackGroupsColors')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackGroupsColors entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackGroupsColors:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing BackGroupsColors entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackGroupsColors')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackGroupsColors entity.');
        }

        $editForm = $this->createForm(new BackGroupsColorsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackGroupsColors:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing BackGroupsColors entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackGroupsColors')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackGroupsColors entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BackGroupsColorsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backgroupscolors_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:BackGroupsColors:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BackGroupsColors entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:BackGroupsColors')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BackGroupsColors entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backgroupscolors'));
    }

    /**
     * Creates a form to delete a BackGroupsColors entity by id.
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
