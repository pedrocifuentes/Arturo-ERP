<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Production\ProductionBundle\Entity\FosUserGroup;
use Production\ProductionBundle\Form\FosUserGroupType;

/**
 * FosUserGroup controller.
 *
 * @Route("/fosusergroup")
 */
class FosUserGroupController extends Controller
{
    /**
     * Lists all FosUserGroup entities.
     *
     * @Route("/", name="fosusergroup")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:FosUserGroup')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new FosUserGroup entity.
     *
     * @Route("/", name="fosusergroup_create")
     * @Method("POST")
     * @Template("ProductionBundle:FosUserGroup:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new FosUserGroup();
        $form = $this->createForm(new FosUserGroupType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fosusergroup_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new FosUserGroup entity.
     *
     * @Route("/new", name="fosusergroup_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new FosUserGroup();
        $form   = $this->createForm(new FosUserGroupType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a FosUserGroup entity.
     *
     * @Route("/{id}", name="fosusergroup_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:FosUserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing FosUserGroup entity.
     *
     * @Route("/{id}/edit", name="fosusergroup_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:FosUserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserGroup entity.');
        }

        $editForm = $this->createForm(new FosUserGroupType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing FosUserGroup entity.
     *
     * @Route("/{id}", name="fosusergroup_update")
     * @Method("PUT")
     * @Template("ProductionBundle:FosUserGroup:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:FosUserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FosUserGroupType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fosusergroup_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a FosUserGroup entity.
     *
     * @Route("/{id}", name="fosusergroup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:FosUserGroup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FosUserGroup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fosusergroup'));
    }

    /**
     * Creates a form to delete a FosUserGroup entity by id.
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
