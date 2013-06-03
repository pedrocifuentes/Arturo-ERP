<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProdOrdersDetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('items')
            ->add('backColor')
            ->add('backModel')
            ->add('backSize')
            ->add('prodOrder')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\ProdOrdersDetail'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_prodordersdetailtype';
    }
}
