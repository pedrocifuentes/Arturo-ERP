<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BackColorsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name')
                ->add('code')
                ->add('image', 'file', array(
                    'data_class' => null,
                ))
                ->add('rgb')
                ->add('active')
                ->add('sort')
                ->add('backGroupsColor')
        //->add('model')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\BackColors'
        ));
    }

    public function getName() {
        return 'production_productionbundle_backcolorstype';
    }

}
