<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Production\ProductionBundle\Entity\ProdProviders;
use Production\ProductionBundle\Form\ProdProvidersType;

/**
 * ProdProviders controller.
 *
 */
class ProdProvidersController extends Controller
{
    /**
     * Lists all ProdProviders entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:ProdProviders')->findAll();
        
        $new_entities = array();
        foreach ($entities as $entity){
            $deleteForm = $this->createDeleteForm($entity->getId());
            
            /*$prodModels = array();
            $repository = $this->getDoctrine()->getRepository('ProductionBundle:ProdProvidersHasModels');
            $query = $repository->createQueryBuilder('p')
                    ->where('p.prodProvider = :prod_provider_id')
                    ->setParameter('prod_provider_id', $entity->getId())
                    ->orderBy('p.id', 'ASC')
                    ->getQuery();            
            $ProdModels = $query->getResult();
            
            $tmp = "";
            if($ProdModels){
                foreach($ProdModels as $pmk => $pmv){
                    $repository = $this->getDoctrine()->getRepository('ProductionBundle:BackModels');
                    $query = $repository->createQueryBuilder('p')
                        ->where('p.id = :id')
                        ->setParameter('id', $pmv->getId())
                        ->orderBy('p.id', 'ASC')
                        ->getQuery();            
                    $models = $query->getResult();
                    foreach($models as $m){
                        $prodModels[] = $m->getCode();
                    }
                }
                $tmp = @implode(",", $prodModels);
            }*/
            
            $new_entities[] = array(
                'id' => $entity->getId(),
                'name' => $entity->getName(),
                'getBackModels' => $entity->getBackModels(),
                'delete_form' => $deleteForm->createView(),
            );
        }
        
        return $this->render('ProductionBundle:ProdProviders:index.html.twig', array(
            'entities' => $new_entities,
        ));
    }

    /**
     * Creates a new ProdProviders entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ProdProviders();
        $form = $this->createForm(new ProdProvidersType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            
            

            return $this->redirect($this->generateUrl('prodproviders_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:ProdProviders:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new ProdProviders entity.
     *
     */
    public function newAction()
    {
        $entity = new ProdProviders();
        $form   = $this->createForm(new ProdProvidersType(), $entity);

        return $this->render('ProductionBundle:ProdProviders:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProdProviders entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdProviders')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdProviders entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdProviders:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ProdProviders entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdProviders')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdProviders entity.');
        }

        $editForm = $this->createForm(new ProdProvidersType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdProviders:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ProdProviders entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdProviders')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdProviders entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProdProvidersType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodproviders_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:ProdProviders:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProdProviders entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:ProdProviders')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProdProviders entity.');
            }

            $em->remove($entity);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('prodproviders'));
    }

    /**
     * Creates a form to delete a ProdProviders entity by id.
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
