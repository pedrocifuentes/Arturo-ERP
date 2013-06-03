<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProdCalendarOrdersDetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('items')
            ->add('prodCalendarOrder')
            ->add('backColor')
            ->add('backModel')
            ->add('backSize')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\ProdCalendarOrdersDetail'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_prodcalendarordersdetailtype';
    }
}
