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
                ->add('phone')
                ->add('active')
                ->add('email')
                ->add('backModel', 'entity', array(
                    'class' => 'ProductionBundle:BackModels',
                    'property' => 'name',
                    'multiple' => true
                ));

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
