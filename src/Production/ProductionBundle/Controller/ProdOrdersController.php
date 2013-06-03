<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Production\ProductionBundle\Entity\ProdOrders;
use Production\ProductionBundle\Form\ProdOrdersType;
use Production\ProductionBundle\Form\ProdProposalType;
use Production\ProductionBundle\Entity\ProdOrdersDetail;
use Production\ProductionBundle\Entity\ProdOrdersComments;

/**
 * ProdOrders controller.
 *
 */
class ProdOrdersController extends Controller {

    public function mailAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        //Get admin emails list
        $email_address = $this->container->getParameter('proposal_admin_email');

        //Get Proposal order
        $prodOrder = $em->getRepository('ProductionBundle:ProdOrders')->find($request->query->get('id'));
        //Get Proposal order detail
        $prodOrderDetail = $em->getRepository('ProductionBundle:ProdOrdersDetail')->findOneByProdOrder($prodOrder);

        foreach ($email_address as $k => $toEmail) {
            
            //set login user id instead of 
            $fromEmail = $em->getRepository('ProductionBundle:BackUsersOld')->find(2);
            
            //Get admin emails list details
            $adminUser = $em->getRepository('ProductionBundle:BackUsersOld')->findOneByEmail('deven@vidium.es');
            $message = \Swift_Message::newInstance()
                    ->setSubject('APPLICATION FOR APPROVAL')
                    ->setFrom($fromEmail->getEmail())
                    ->setTo($toEmail)
                    ->setContentType('text/html')
                    ->setBody($this->renderView(
                            'ProductionBundle:ProdOrders:mail.html.twig', array('adminUser' => ($adminUser ? $adminUser->getNickname() : 'Sir'), 'emailFrom' => $fromEmail->getNickname(), 'prodOrder' => $prodOrder, 'prodOrderDetail' => $prodOrderDetail)
            ));
            $this->get('mailer')->send($message);
        }
        /* return $this->renderView(
          'ProductionBundle:ProdOrders:mail.html.twig', array('adminUser' => ($adminUser ? $adminUser->getNickname() : 'Sir'), 'prodOrder' => $prodOrder, 'prodOrderDetail' => $prodOrderDetail)
          ); */       
        return $this->redirect($this->generateUrl("prodorders_edit", array('id' => $prodOrder->getId())));
    }

    /**
     * Lists all ProdOrders entities.
     *
     */
    public function indexAction() {


        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductionBundle:ProdOrders')->findAll();

        $em->flush();
        return $this->render('ProductionBundle:ProdOrders:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Lists all Comments of ProdOrders entities.
     *
     */
    public function getcommentsAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdOrders')->find($request->request->get("pid"));
        $comments = $em->getRepository('ProductionBundle:ProdOrdersComments')->findByProdOrder($entity);

        $em->flush();
        return $this->render('ProductionBundle:ProdOrders:getcomments.html.twig', array(
                    'comments' => $comments,
        ));
    }

    /**
     * Add Comments of ProdOrder entities.
     *
     */
    public function addcommentAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $pComments = new ProdOrdersComments();
        $pComments->setComment($request->request->get("comment"));
        $pComments->setProdOrder($em->getRepository('ProductionBundle:ProdOrders')->find($request->request->get("pid")));
        $pComments->setBackUser($em->getRepository('ProductionBundle:BackUsersOld')->find(1));
        $pComments->setCreatedAt(new \DateTime());
        $em->persist($pComments);

        $em->flush();
        return $this->render('ProductionBundle:ProdOrders:addcomment.html.twig');
    }

    /**
     * Delete Comments of ProdOrder entities.
     *
     */
    public function delcommentsAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $comment = $em->getRepository('ProductionBundle:ProdOrdersComments')->find($request->query->get("id"));
        $em->remove($comment);

        $em->flush();

        exit('success');
    }

    /**
     * Creates a new ProdOrders entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new ProdOrders();
        $form = $this->createForm(new ProdProposalType(), $entity);
        $form->bind($request);
        $entity->setDocItems(0);

        if ($form->isValid()) {
            $sizes = $form["docDate"]->getData();
            //$data = $request->request->all();
            //$doc_date = $data['production_productionbundle_prodorderstype']['docDate'];
            //$doc_date = @explode("-", $doc_date);
            //print_r($doc_date);die;
            $em = $this->getDoctrine()->getManager();
            $backuser = $em->getRepository('ProductionBundle:BackUsersOld')->find(1);
            $entity->setBackUser($backuser);
            $entity->setDocStatus(1);
            $em->persist($entity);
            $em->flush();

            $ProdOrderId = $entity->getId();
            $sizes = $request->request->get("sizes");
            $size_ids = $request->request->get("size_ids");
            $models = $request->request->get("models");
            $colors = $request->request->get("colors");
            $box_limit = $request->request->get("box_limit");
            $docitem_total = $loop_cnt = 0;

            if ($sizes) {
                foreach ($sizes as $size_key => $size) {
                    if (count($size) > 0) {
                        foreach ($size as $sk => $s) {
                            $prodOrder = $em->getRepository('ProductionBundle:ProdOrders')->find($ProdOrderId);
                            $backModel = $em->getRepository('ProductionBundle:BackModels')->find($models[0]);
                            $backColor = $em->getRepository('ProductionBundle:BackColors')->find($colors[$loop_cnt]);
                            $backSize = $em->getRepository('ProductionBundle:BackSizes')->find($size_ids[$size_key][$sk]);

                            $ProdOrders = new ProdOrdersDetail();
                            $ProdOrders->setProdOrder($prodOrder);
                            $ProdOrders->setBackModel($backModel);
                            $ProdOrders->setBackColor($backColor);
                            $ProdOrders->setBackSize($backSize);

                            $ProdOrders->setProdOrderId($ProdOrderId);
                            $ProdOrders->setBackModelId($models[0]);
                            $ProdOrders->setBackColorId($colors[$loop_cnt]);
                            $ProdOrders->setBackSizeId($size_ids[$size_key][$sk]);
                            $ProdOrders->setItems($s);

                            $em->persist($ProdOrders);
                            $em->flush();

                            $docitem_total = $docitem_total + $s;
                        }
                    }
                    $loop_cnt++;
                }
            }

            $prodOrders = $em->getRepository('ProductionBundle:ProdOrders')->find($ProdOrderId);
            if ($prodOrders) {
                $prodOrders->setDocItems($docitem_total);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('prodorders_show', array('id' => $entity->getId())));
        }

        $em = $this->getDoctrine()->getManager();
        $models = $em->getRepository('ProductionBundle:BackModels')->findAll();

        return $this->render('ProductionBundle:ProdOrders:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'models' => $models,
        ));
    }

    /**
     * Displays a form to create a new ProdOrders entity.
     *
     */
    public function newAction() {
        $em = $this->getDoctrine()->getManager();
        $models = $em->getRepository('ProductionBundle:BackModels')->findByActive('1');


        $query = $em->createQuery('SELECT MAX(po.id) as noofproposal FROM ProductionBundle:ProdOrders po');
        $noofporders = $query->getSingleScalarResult();


        $entity = new ProdOrders();
        $entity->setDocNo('PROP' . str_pad((int) $noofporders + 1, 4, "0", STR_PAD_LEFT));
        $form = $this->createForm(new ProdProposalType(), $entity);

        $models = $em->getRepository('ProductionBundle:BackModels')->findAll();

        return $this->render('ProductionBundle:ProdOrders:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'models' => $models,
        ));
    }

    /**
     * Finds and displays a ProdOrders entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdOrders')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdOrders entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $em->flush();
        return $this->render('ProductionBundle:ProdOrders:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing ProdOrders entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdOrders')->find($id);
        $comments = $em->getRepository('ProductionBundle:ProdOrdersComments')->findByProdOrder($entity);

        $prodOrderDetail = array();
        $docitem_total = 0;
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdOrders entity.');
        } else {
            $repository = $this->getDoctrine()->getRepository('ProductionBundle:ProdOrdersDetail');
            $query = $repository->createQueryBuilder('p')
                    ->where('p.prodOrder = :prod_order_id')
                    ->setParameter('prod_order_id', $entity->getId())
                    ->getQuery();
            $prodOrderDetail = $query->getResult();
            if ($prodOrderDetail) {
                foreach ($prodOrderDetail as $pod) {
                    $docitem_total = $docitem_total + $pod->getItems();
                }
            }
        }

        $prodOrderModel = $em->getRepository('ProductionBundle:BackModels')->findOneById($prodOrderDetail[0]->getBackModelId());
        $prodOrderModelProvider = $prodOrderModel->getProdProvider();
        $models = $em->getRepository('ProductionBundle:BackModels')->findAll();
        $editForm = $this->createForm(new ProdProposalType(), $entity);

        return $this->render('ProductionBundle:ProdOrders:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'prod_order_details' => $prodOrderDetail,
                    'models' => $models,
                    'comments' => $comments,
                    'prodOrderModelProvider' => $prodOrderModelProvider,
                    'docitem_total' => $docitem_total,
        ));
    }

    /**
     * Edits an existing ProdOrders entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductionBundle:ProdOrders')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProdOrders entity.');
        }

        $editForm = $this->createForm(new ProdOrdersType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $data = $request->request->all();
            $doc_date = $data['production_productionbundle_prodorderstype']['docDate'];

            $backuser = $em->getRepository('ProductionBundle:BackUsersOld')->find(1);
            $entity->setBackUser($backuser);
            $entity->setDocDate(new \DateTime($doc_date));
            $em->persist($entity);
            $em->flush();

            $ProdOrderId = $id;
            $sizes = $request->request->get("sizes");
            $sizes = array_values($sizes);
            $size_ids = $request->request->get("size_ids");
            $size_ids = array_values($size_ids);
            $models = $request->request->get("models");
            $colors = $request->request->get("colors");
            $colors = array_values($colors);
            $box_limit = $request->request->get("box_limit");
            $docitem_total = $loop_cnt = 0;

            if ($sizes) {
                foreach ($sizes as $size_key => $size) {
                    if (count($size) > 0) {
                        foreach ($size as $sk => $s) {
                            $repository = $this->getDoctrine()->getRepository('ProductionBundle:ProdOrdersDetail');
                            $poDetail = $repository->findOneBy(array(
                                'prod_order_id' => $id
                            ));
                            if ($poDetail) {
                                $em->remove($poDetail);
                                $em->flush();
                            }
                        }
                        $loop_cnt++;
                    }
                }
            }

            if ($sizes) {
                $loop_cnt = 0;
                foreach ($sizes as $size_key => $size) {
                    if (count($size) > 0) {
                        $size_ids = array_values($size_ids);
                        $colors = array_unique($colors);
                        $colors = array_values($colors);
                        foreach ($size as $sk => $s) {
                            $prodOrder = $em->getRepository('ProductionBundle:ProdOrders')->find($ProdOrderId);
                            $backModel = $em->getRepository('ProductionBundle:BackModels')->find($models[0]);
                            $backColor = $em->getRepository('ProductionBundle:BackColors')->find($colors[$loop_cnt]);
                            $backSize = $em->getRepository('ProductionBundle:BackSizes')->find($size_ids[$size_key][$sk]);

                            $ProdOrders = new ProdOrdersDetail();
                            $ProdOrders->setProdOrder($prodOrder);
                            $ProdOrders->setBackModel($backModel);
                            $ProdOrders->setBackColor($backColor);
                            $ProdOrders->setBackSize($backSize);

                            $ProdOrders->setProdOrderId($ProdOrderId);
                            $ProdOrders->setBackModelId($models[0]);
                            $ProdOrders->setBackColorId($colors[$loop_cnt]);
                            $ProdOrders->setBackSizeId($size_ids[$size_key][$sk]);
                            $ProdOrders->setItems($s);

                            $em->persist($ProdOrders);
                            $em->flush();

                            $docitem_total = $docitem_total + $s;
                        }
                    }
                    $loop_cnt++;
                }
            }

            $prodOrders = $em->getRepository('ProductionBundle:ProdOrders')->find($ProdOrderId);
            if ($prodOrders) {
                $prodOrders->setDocItems($docitem_total);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('prodorders_edit', array('id' => $id)));
        }

        return $this->render('ProductionBundle:ProdOrders:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'docitem_total' => $docitem_total,
        ));
    }

    /**
     * Deletes a ProdOrders entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProductionBundle:ProdOrders')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProdOrders entity.');
            }
            $repository = $this->getDoctrine()->getRepository('ProductionBundle:ProdOrdersDetail');
            $poDetail = $repository->findOneBy(array(
                'prod_order_id' => $id
            ));
            //if ($poDetail) {
            //$em->remove($poDetail);
            //$em->flush();

            $em->remove($entity);
            $em->flush();
            //}
        }

        return $this->redirect($this->generateUrl('prodorders'));
    }

    /**
     * Creates a form to delete a ProdOrders entity by id.
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
     * Get colors from model
     *
     */
    public function getmodelcolorsAction(Request $request, $id) {
        $colors_arr = array();
        if ($id) {
            $em = $this->getDoctrine()->getManager();

            $repository = $this->getDoctrine()->getRepository('ProductionBundle:BackModels');
            $query = $repository->createQueryBuilder('p')
                    ->where('p.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery();
            $Models = $query->getResult();

            foreach ($Models as $ck => $cv) {
                $colors_arr = $cv->getColorMaster();
            }
        }
        return $this->render('ProductionBundle:ProdOrders:colors.html.twig', array(
                    'colors' => $colors_arr,
        ));
    }

    /**
     * Get sizes from model and color
     *
     */
    public function getmodelsizesAction(Request $request, $id) {
        $sizes_arr = array();
        if ($id) {
            $em = $this->getDoctrine()->getManager();

            $repository = $this->getDoctrine()->getRepository('ProductionBundle:BackModels');
            $query = $repository->createQueryBuilder('p')
                    ->where('p.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery();
            $Models = $query->getResult();

            foreach ($Models as $ck => $cv) {
                $repository = $this->getDoctrine()->getRepository('ProductionBundle:BackModels');
                $query = $repository->createQueryBuilder('p')
                        ->where('p.id = :id')
                        ->setParameter('id', $id)
                        ->getQuery();
                $Models = $query->getResult();

                $repository = $this->getDoctrine()->getRepository('ProductionBundle:Products');
                $query = $repository->createQueryBuilder('m')
                        ->where('m.backModels = :id')
                        ->setParameter('id', $id)
                        ->getQuery();
                $Products = $query->getResult();
                foreach ($Products as $pk => $pv) {
                    $sizes_arr[$pk]['id'] = $pv->getBackSizes()->getId();
                    $sizes_arr[$pk]['name'] = $pv->getBackSizes()->getName();
                }
            }
        }
        return $this->render('ProductionBundle:ProdOrders:sizes.html.twig', array(
                    'sizes' => $sizes_arr,
                    'box_limit' => $cv->getBox(),
        ));
    }

    /**
     * Get sizes from model and color
     *
     */
    public function getcolortosizeAction(Request $request) {
        $sizes_arr = array();
        $id = $request->query->get("id");
        $color_id = $request->query->get("color_id");
        if ($id) {
            $em = $this->getDoctrine()->getManager();

            $repository = $this->getDoctrine()->getRepository('ProductionBundle:BackModels');
            $query = $repository->createQueryBuilder('p')
                    ->where('p.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery();
            $Models = $query->getResult();

            foreach ($Models as $ck => $cv) {
                $repository = $this->getDoctrine()->getRepository('ProductionBundle:BackModels');
                $query = $repository->createQueryBuilder('p')
                        ->where('p.id = :id')
                        ->setParameter('id', $id)
                        ->getQuery();
                $Models = $query->getResult();

                $repository = $this->getDoctrine()->getRepository('ProductionBundle:Products');
                $query = $repository->createQueryBuilder('m')
                        ->where('m.backModels = :id')
                        ->andWhere('m.backColors = :color_id')
                        ->setParameter('id', $id)
                        ->setParameter('color_id', $color_id)
                        ->getQuery();
                $Products = $query->getResult();
                foreach ($Products as $pk => $pv) {
                    $sizes_arr[$pk]['id'] = $pv->getBackSizes()->getId();
                    $sizes_arr[$pk]['name'] = $pv->getBackSizes()->getName();
                }
            }
        }
        return $this->render('ProductionBundle:ProdOrders:sizes.html.twig', array(
                    'sizes' => $sizes_arr,
                    'color_id' => $color_id,
                    'box_limit' => $cv->getBox(),
        ));
    }

}
