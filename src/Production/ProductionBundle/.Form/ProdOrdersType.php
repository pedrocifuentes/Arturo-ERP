<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProdOrdersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('docNo')
            ->add('docNavision')
            ->add('docItems')
            ->add('docDate')
            ->add('docStatus')
            ->add('acceptedDate')
            ->add('paymentDate')
            ->add('paymentExchange')
            ->add('backUser')
            ->add('prodPrice')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\ProdOrders'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_prodorderstype';
    }
}
