<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\BackUsersOld;
use Production\ProductionBundle\Form\BackUsersOldType;

/**
 * BackUsersOld controller.
 *
 */
class BackUsersOldController extends Controller
{
    /**
     * Lists all BackUsersOld entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:BackUsersOld')->findAll();

        return $this->render('ProductionBundle:BackUsersOld:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new BackUsersOld entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new BackUsersOld();
        $form = $this->createForm(new BackUsersOldType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backusersold_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:BackUsersOld:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new BackUsersOld entity.
     *
     */
    public function newAction()
    {
        $entity = new BackUsersOld();
        $form   = $this->createForm(new BackUsersOldType(), $entity);

        return $this->render('ProductionBundle:BackUsersOld:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BackUsersOld entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackUsersOld')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackUsersOld entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackUsersOld:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing BackUsersOld entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackUsersOld')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackUsersOld entity.');
        }

        $editForm = $this->createForm(new BackUsersOldType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackUsersOld:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing BackUsersOld entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackUsersOld')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackUsersOld entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BackUsersOldType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backusersold_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:BackUsersOld:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BackUsersOld entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:BackUsersOld')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BackUsersOld entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backusersold'));
    }

    /**
     * Creates a form to delete a BackUsersOld entity by id.
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
