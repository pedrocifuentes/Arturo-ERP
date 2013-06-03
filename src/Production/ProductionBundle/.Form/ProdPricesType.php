<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProdPricesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fromDate')
            ->add('toDate')
            ->add('cottonPrice')
            ->add('docStatus')
            ->add('active')
            ->add('backUser')
            ->add('prodProvider')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\ProdPrices'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_prodpricestype';
    }
}
