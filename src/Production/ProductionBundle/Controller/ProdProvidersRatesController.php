<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Production\ProductionBundle\Entity\ProdProvidersRates;
use Production\ProductionBundle\Form\ProdProvidersRatesType;
use Production\ProductionBundle\Entity\ProdProviders;

/**
 * ProdProvidersRates controller.
 *
 */
class ProdProvidersRatesController extends Controller {

    /**
     * Lists all ProdProvidersRates entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:ProdProvidersRates')->findAll();

        $ma__suppliers = array();
        $suppliers = $em->getRepository('ProductionBundle:ProdProviders')->findAll();
        foreach ($suppliers as $s) {
            $ma__suppliers[] = $s;
        }

        return $this->render('ProductionBundle:ProdProvidersRates:index.html.twig', array(
                    'entities' => $entities,
                    'suppliers' => $ma__suppliers
                ));
    }

    /**
     * Creates a new ProdProvidersRates entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new ProdProvidersRates();
        $form = $this->createForm(new ProdProvidersRatesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodprovidersrates_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:ProdProvidersRates:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }

    /**
     * Displays a form to create a new ProdProvidersRates entity.
     *
     */
    public function newAction() {
        $entity = new ProdProvidersRates();
        $form = $this->createForm(new ProdProvidersRatesType(), $entity);

        return $this->render('ProductionBundle:ProdProvidersRates:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }

    /**
     * Finds and displays a ProdProvidersRates entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdProvidersRates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdProvidersRates entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdProvidersRates:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing ProdProvidersRates entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdProvidersRates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdProvidersRates entity.');
        }

        $editForm = $this->createForm(new ProdProvidersRatesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdProvidersRates:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Edits an existing ProdProvidersRates entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdProvidersRates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdProvidersRates entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProdProvidersRatesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodprovidersrates_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:ProdProvidersRates:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Deletes a ProdProvidersRates entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:ProdProvidersRates')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProdProvidersRates entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prodprovidersrates'));
    }

    /**
     * Creates a form to delete a ProdProvidersRates entity by id.
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

    /**
     * Get Price list for selected supplier
     *
     */
    public function pricelistAction(Request $request, $id) {
        $repository = $this->getDoctrine()->getRepository('ProductionBundle:ProdProvidersRates');
        $query = $repository->createQueryBuilder('p')
                ->where('p.prodProviders = :prod_providers_id')
                ->setParameter('prod_providers_id', $id)
                ->orderBy('p.id', 'ASC')
                ->getQuery();
        $entities = $query->getResult();

        return $this->render('ProductionBundle:ProdProvidersRates:pricelist.html.twig', array(
                    'entities' => $entities,
                ));
    }

    /**
     * Finds and displays providers model/size rates
     *
     */
    public function viewAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdProvidersRates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdProvidersRates entity.');
        }

        $providers_model = array();
        $prodModels = array();
        $repository = $this->getDoctrine()->getRepository('ProductionBundle:ProdProvidersHasModels');
        $query = $repository->createQueryBuilder('p')
                ->where('p.prodProvider = :prod_provider_id')
                ->setParameter('prod_provider_id', $entity->getProdProviders())
                ->orderBy('p.id', 'ASC')
                ->getQuery();
        $ProdModels = $query->getResult();

        $tmp = "";
        if ($ProdModels) {
            foreach ($ProdModels as $pmk => $pmv) {
                $repository = $this->getDoctrine()->getRepository('ProductionBundle:BackModels');
                $query = $repository->createQueryBuilder('p')
                        ->where('p.id = :id')
                        ->setParameter('id', $pmv->getId())
                        ->orderBy('p.id', 'ASC')
                        ->getQuery();
                $models = $query->getResult();
                if ($models) {
                    foreach ($models as $k => $m) {
                        $providers_model[$pmv->getId()]['id'] = $pmv->getId();
                        $providers_model[$pmv->getId()]['code'] = $m->getCode();
                    }
                }
            }
        }

        $color_group = $em->getRepository('ProductionBundle:BackGroupsColors')->findAll();

       /* $arr_list = false;
        $repository = $this->getDoctrine()->getRepository('ProductionBundle:ProdProvidersHasModels');
        $query = $repository->createQueryBuilder('php')
                ->innerJoin('php.backModels prod')
                ->where('php.prodProvider = :prod_provider_id')
                ->setParameter('prod_provider_id', $entity->getProdProviders())
                  ->orderBy('p.id', 'ASC')
                ->getQuery();
        $Models = $query->getResult();
        
        $ddat = Doctrine_Query::create()
                ->select("prod.id as prod_id, prod.talla_master as prod_talla_master, prod.referencia as prod_referencia, php.proveedores_id as php_prov_id")
                ->from('ProveedoresHasProductos php')
                ->innerJoin('php.Productos prod')
                ->where('php.proveedores_id = ?', $supplier);
        //->andWhere('prod.activo = 1');

        if (strlen(trim($model)) > 0)
            $ddat->andWhere('php.productos_id = ?', $model);

        $ddat->orderBy('prod.orden');

        if ($ddat->count() > 0) {
            if ($no_sizes) {
                foreach ($ddat->execute() as $key => $value)
                    $arr_list[$value->getProdId()] = $value->getProdReferencia();
            } else {
                foreach ($ddat->execute() as $obj_key => $obj_val) {
                    //$listaTallas = Doctrine_Core::getTable('Productos')->loadloadForSelect($value->getProdId(), 'tallas'); 
                    //$arr_list[$value->getProdId().'&'.$value->getProdReferencia()] = $listaTallas;   

                    $arr_list[$obj_val->getProdId()]['id'] = $obj_val->getProdId();
                    $arr_list[$obj_val->getProdId()]['talla_master'] = $obj_val->getProdTallaMaster();
                    $arr_list[$obj_val->getProdId()]['referencia'] = $obj_val->getProdReferencia();
                    $arr_list[$obj_val->getProdId()]['tallas'] = Doctrine_Core::getTable('Productos')->loadloadForSelect($obj_val->getProdId(), 'tallas');
                }
            }
        }*/

        return $this->render('ProductionBundle:ProdProvidersRates:view.html.twig', array(
                    'entity' => $entity,
                    'models' => $providers_model,
                    'group_colors' => $color_group,
                ));
    }

}
