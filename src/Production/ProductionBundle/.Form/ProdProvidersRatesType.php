<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProdProvidersRatesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fromDate')
            ->add('toDate')
            ->add('cottonPrice')
            ->add('active')
            ->add('docDelete')
            ->add('backUsersOld')
            ->add('prodProviders')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\ProdProvidersRates'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_prodprovidersratestype';
    }
}
