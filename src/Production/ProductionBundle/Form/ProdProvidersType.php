<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProdProvidersType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name')
                ->add('contact')
                ->add('cifNif')
                ->add('address')
                ->add('phone', null, array('attr' => array('type' =>'tel')))
                ->add('email', 'email', array('attr' => array()))
                ->add('active')
                ->add('backModel')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\ProdProviders'
        ));
    }

    public function getName() {
        return 'production_productionbundle_prodproviderstype';
    }

}
