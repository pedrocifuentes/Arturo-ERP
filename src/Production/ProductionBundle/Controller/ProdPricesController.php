<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Production\ProductionBundle\Entity\ProdPrices;
use Production\ProductionBundle\Entity\ProdPricesDetail;
use Production\ProductionBundle\Entity\BackUsersOld;
use Production\ProductionBundle\Entity\BackGroupsColors;
use Production\ProductionBundle\Entity\BackColors;
use Production\ProductionBundle\Entity\BackSizes;
use Production\ProductionBundle\Entity\BackModels;
use Production\ProductionBundle\Form\ProdPricesType;
use Production\ProductionBundle\Form\ProdPricesDetailType;

/**
 * ProdPrices controller.
 *
 */
class ProdPricesController extends Controller {

    /**
     * Lists all ProdPrices entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:ProdPrices')->findAll();

        $ma__suppliers = array();
        $suppliers = $em->getRepository('ProductionBundle:ProdProviders')->findAll();
        foreach ($suppliers as $s) {
            $ma__suppliers[] = $s;
        }

        return $this->render('ProductionBundle:ProdPrices:index.html.twig', array(
                    'entities' => $entities,
                    'suppliers' => $ma__suppliers
                ));
    }

    /**
     * Creates a new ProdPrices entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new ProdPrices();
        $form = $this->createForm(new ProdPricesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodprices_show', array('id' => $entity->getId())));
        }

        return $this->render('ProductionBundle:ProdPrices:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }

    /**
     * Displays a form to create a new ProdPrices entity.
     *
     */
    public function newAction() {
        $entity = new ProdPrices();
        $form = $this->createForm(new ProdPricesType(), $entity);

        return $this->render('ProductionBundle:ProdPrices:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }

    /**
     * Finds and displays a ProdPrices entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdPrices')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdPrices entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdPrices:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing ProdPrices entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdPrices')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdPrices entity.');
        }

        $editForm = $this->createForm(new ProdPricesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdPrices:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Edits an existing ProdPrices entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdPrices')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdPrices entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProdPricesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prodprices_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:ProdPrices:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Deletes a ProdPrices entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:ProdPrices')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProdPrices entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prodprices'));
    }

    /**
     * Creates a form to delete a ProdPrices entity by id.
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
        $repository = $this->getDoctrine()->getRepository('ProductionBundle:ProdPrices');
        $query = $repository->createQueryBuilder('p')
                ->where('p.prodProvider = :prod_provider_id')
                ->setParameter('prod_provider_id', $id)
                ->orderBy('p.id', 'ASC')
                ->getQuery();
        $entities = $query->getResult();

        return $this->render('ProductionBundle:ProdPrices:pricelist.html.twig', array(
                    'entities' => $entities,
                ));
    }

    /**
     * Finds and displays providers model/size rates
     *
     */
    public function viewAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdPrices')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdPrices entity.');
        }

        $providers_model = $prodModels = $arr_list = array();
        $ProdModels = $entity->getProdProvider()->getModelsData();

        if ($ProdModels) {
            foreach ($ProdModels as $pmk => $pmv) {
                $providers_model[$pmv['id']]['id'] = $pmv['id'];
                $providers_model[$pmv['id']]['code'] = $pmv['code'];
                $providers_model[$pmv['id']]['master_size'] = $pmv['master_size'];
                $providers_model[$pmv['id']]['talla_master'] = $pmv['talla_master'];
                $providers_model[$pmv['id']]['referencia'] = $pmv['referencia'];
                $providers_model[$pmv['id']]['tallas'] = $pmv['tallas'];
            }
        }
        $color_group = $em->getRepository('ProductionBundle:BackGroupsColors')->findAll();

        $allmodel = $em->getRepository('ProductionBundle:BackModels')->findAll();

        $prices = $em->getRepository('ProductionBundle:ProdPricesDetail')->findAll();
        if ($prices) {
            foreach ($prices as $pr) {
                $arr_list[$pr->getProdPriceId() . '-' . $pr->getBackGroupsColorId() . '-' . $pr->getBackModelId() . '-' . $pr->getBackSizeId()] = $pr->getPrice();
            }
        }
        //print_r($arr_list);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProductionBundle:ProdPrices:view.html.twig', array(
                    'entity' => $entity,
                    'models' => $providers_model,
                    'allmodel' => $allmodel,
                    'group_colors' => $color_group,
                    'prices' => $arr_list,
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Save Price list for selected supplier
     *
     */
    public function savepriceAction(Request $request) {

        if ($request->isXmlHttpRequest()) {
            $elementid = $request->request->get('elementid');
            $newprice = $request->request->get('newvalue');
            //$newprice = str_replace(array(',', '.'), '', $newprice);

            $param = explode('-', $elementid);

            $repository = $this->getDoctrine()->getRepository('ProductionBundle:ProdPricesDetail');
            $em = $this->getDoctrine()->getManager();
            $prodPricesDetail = $repository->findOneBy(array(
                'prod_price_id' => $param[1],
                'back_groups_color_id' => $param[2],
                'back_model_id' => $param[4],
                'back_size_id' => $param[3])
            );

            if (!$prodPricesDetail) {
                $prodPrice = $em->getRepository('ProductionBundle:ProdPrices')->find($param[1]);
                $groupsColor = $em->getRepository('ProductionBundle:BackGroupsColors')->find($param[2]);
                $backModel = $em->getRepository('ProductionBundle:BackModels')->find($param[4]);
                $backSize = $em->getRepository('ProductionBundle:BackSizes')->find($param[3]);
                $backuser = $em->getRepository('ProductionBundle:BackUsersOld')->find($prodPrice->getBackUser()->getId());

                $prodPricesDetail = new ProdPricesDetail();
                $prodPricesDetail->setProdPrice($prodPrice);
                $prodPricesDetail->setBackGroupsColor($groupsColor);
                $prodPricesDetail->setBackModel($backModel);
                $prodPricesDetail->setBackSize($backSize);
                $prodPricesDetail->setBackUser($backuser);
                $prodPricesDetail->setProdPriceId($param[1]);
                $prodPricesDetail->setBackGroupsColorId($param[2]);
                $prodPricesDetail->setBackModelId($param[4]);
                $prodPricesDetail->setBackSizeId($param[3]);
                $prodPricesDetail->setPrice($newprice);
                $prodPricesDetail->setCreatedAt(new \DateTime());
            }
            $prodPricesDetail->setPrice($newprice);
            $prodPricesDetail->setUpdatedAt(new \DateTime());

            try {
                $em->persist($prodPricesDetail);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            $em->flush();
            return $this->render('ProductionBundle:ProdPrices:saveprice.html.twig', array(
                        'prices' => $prodPricesDetail->getPrice(),
                    ));
        }
    }

    public function testAction(Request $request) {
        $ele_id = "price-2-2-4-2-2";
        $newvalue = "10,00";

        $newvalueSave = str_replace(',', '.', $newvalue);
        $newvalue = str_replace('.', ',', $newvalue);

        $param = explode('-', $ele_id);
        //print_r($param);

        $em = $this->getDoctrine()->getManager();
        $prodPrice = $em->getRepository('ProductionBundle:ProdPrices')->find($param[1]);
        $groupsColor = $em->getRepository('ProductionBundle:BackGroupsColors')->find($param[2]);
        $backModel = $em->getRepository('ProductionBundle:BackModels')->find($param[4]);
        $backSize = $em->getRepository('ProductionBundle:BackSizes')->find($param[3]);
        $backuser = $em->getRepository('ProductionBundle:BackUsersOld')->find($param[5]);

        //Full texts 	id 	name 	code 	image 	rgb 	active 	sort 	back_groups_color_id 	created_at 	updated_at
        $ProviderRates = new ProdPricesDetail();
        $ProviderRates->setProdPrice($prodPrice);
        $ProviderRates->setBackGroupsColor($groupsColor);
        $ProviderRates->setBackModel($backModel);
        $ProviderRates->setBackSize($backSize);
        $ProviderRates->setBackUser($backuser);

        $ProviderRates->setProdPriceId($param[1]);
        $ProviderRates->setBackGroupsColorId($param[2]);
        $ProviderRates->setBackModelId($param[3]);
        $ProviderRates->setBackSizeId($param[4]);


        $ProviderRates->setPrice($newvalue);
        $ProviderRates->setCreatedAt(new \DateTime());
        $ProviderRates->setUpdatedAt(new \DateTime());

        try {
            $em->persist($ProviderRates);
            $em->flush();
            echo "success";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $em->flush();

        exit('exit;');
    }

}
