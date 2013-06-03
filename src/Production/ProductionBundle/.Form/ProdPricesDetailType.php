<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProdPricesDetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price')
            ->add('backGroupsColor')
            ->add('backModel')
            ->add('backSize')
            ->add('prodPrice')
            ->add('backUser')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\ProdPricesDetail'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_prodpricesdetailtype';
    }
}
