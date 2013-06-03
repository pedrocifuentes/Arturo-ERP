<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BackModelsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('active')
                ->add('sort')
                ->add('name')
                ->add('code')
                ->add('masterSize', 'entity', array(
                    'class' => 'ProductionBundle:BackSizes',
                    'property' => 'name',
                ))
                ->add('new')
                ->add('bag')
                ->add('box')
                ->add('weightWhite')
                ->add('weightColor')
                //->add('slug')
                ->add('color')
                ->add('size')
        //->add('prodProvider')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\BackModels'
        ));
    }

    public function getName() {
        return 'production_productionbundle_backmodelstype';
    }

}
