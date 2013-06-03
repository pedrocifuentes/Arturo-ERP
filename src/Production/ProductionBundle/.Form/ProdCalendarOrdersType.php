<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProdCalendarOrdersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('fromDate')
            ->add('toDate')
            ->add('googleUrl')
            ->add('description')
            ->add('prodOrder')
            ->add('backUser')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\ProdCalendarOrders'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_prodcalendarorderstype';
    }
}
