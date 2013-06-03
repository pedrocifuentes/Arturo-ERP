<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\FosUserUser;
use Production\ProductionBundle\Form\FosUserUserType;

/**
 * FosUserUser controller.
 *
 */
class FosUserUserController extends Controller
{
    /**
     * Lists all FosUserUser entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:FosUserUser')->findAll();

        return $this->render('ProductionBundle:FosUserUser:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new FosUserUser entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new FosUserUser();
        $form = $this->createForm(new FosUserUserType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fosuseruser_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:FosUserUser:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new FosUserUser entity.
     *
     */
    public function newAction()
    {
        $entity = new FosUserUser();
        $form   = $this->createForm(new FosUserUserType(), $entity);

        return $this->render('ProductionBundle:FosUserUser:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FosUserUser entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:FosUserUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:FosUserUser:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing FosUserUser entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:FosUserUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserUser entity.');
        }

        $editForm = $this->createForm(new FosUserUserType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:FosUserUser:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing FosUserUser entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:FosUserUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FosUserUserType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fosuseruser_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:FosUserUser:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FosUserUser entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:FosUserUser')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FosUserUser entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fosuseruser'));
    }

    /**
     * Creates a form to delete a FosUserUser entity by id.
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
