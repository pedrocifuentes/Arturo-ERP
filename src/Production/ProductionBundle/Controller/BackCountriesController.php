<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\BackCountries;
use Production\ProductionBundle\Form\BackCountriesType;

/**
 * BackCountries controller.
 *
 */
class BackCountriesController extends Controller
{
    /**
     * Lists all BackCountries entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:BackCountries')->findAll();

        return $this->render('ProductionBundle:BackCountries:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new BackCountries entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new BackCountries();
        $form = $this->createForm(new BackCountriesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backcountries_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:BackCountries:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new BackCountries entity.
     *
     */
    public function newAction()
    {
        $entity = new BackCountries();
        $form   = $this->createForm(new BackCountriesType(), $entity);

        return $this->render('ProductionBundle:BackCountries:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BackCountries entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackCountries')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackCountries entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackCountries:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing BackCountries entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackCountries')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackCountries entity.');
        }

        $editForm = $this->createForm(new BackCountriesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:BackCountries:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing BackCountries entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:BackCountries')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackCountries entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BackCountriesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backcountries_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:BackCountries:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BackCountries entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:BackCountries')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BackCountries entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backcountries'));
    }

    /**
     * Creates a form to delete a BackCountries entity by id.
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
