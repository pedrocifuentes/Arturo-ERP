<?php

namespace Production\ProductionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Production\ProductionBundle\Entity\ProdProviders;
use Production\ProductionBundle\Entity\BackModels;
use Production\ProductionBundle\Entity\BackColors;
use Production\ProductionBundle\Entity\BackSizes;
use Production\ProductionBundle\Entity\Proposal;

class ProposalController extends Controller {

    /**
     * Lists all Proposal
     *
     */
    public function indexAction() {
        
    }

    /**
     * New Purchase Proposal
     *
     */
    public function newAction() {
        $em = $this->getDoctrine()->getManager();
        $models = $em->getRepository('ProductionBundle:BackModels')->findByActive('1');

        //$this->productos = Doctrine_Core::getTable('Productos')->loadPrdsCatalog();

        $query = $em->createQuery('SELECT MAX(pp.id) as noofproposal FROM ProductionBundle:PurchaseProposal pp');
        $noofproposal = $query->getSingleScalarResult();

        // create a task and give it some dummy data for this example
        $proposal = new PurchaseProposal();

        $form = $this->createFormBuilder($proposal)
                ->add('doc_no', 'text')
                ->add('doc_date', 'date')
                ->add('doc_status', 'integer')
                ->getForm();

        return $this->render('ProductionBundle:PurchaseProposal:new.html.twig', array(
                    'noofproposal' => 'PROP' . str_pad((int) $noofproposal + 1, 4, "0", STR_PAD_LEFT),
                    'productos' => $models,
                    'form' => $form->createView(),
                ));
    }

}
