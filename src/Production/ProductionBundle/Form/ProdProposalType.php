<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProdProposalType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('docNo', null, array('label' => 'Proposal No.', 'read_only' => true))
                ->add('docDate', 'date', array(
                    'attr' => array('class' => 'datepicker'),
                    'widget' => 'single_text',
                ))
//                ->add('acceptedDate', 'date', array(
//                    'attr' => array('class' => 'datepicker'),
//                    'widget' => 'single_text',
//                    'required' => false,
//                ))
                ->add('docStatus', 'choice', array(
                    'choices' => array('1' => 'Pending', '2' => 'Accepted', '3' => 'Rejected', '4' => 'Blocked', '5' => 'Deleted')
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\ProdOrders'
        ));
    }

    public function getName() {
        return 'production_productionbundle_prodorderstype';
    }

}
