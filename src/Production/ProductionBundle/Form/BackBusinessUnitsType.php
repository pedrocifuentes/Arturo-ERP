<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BackBusinessUnitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('code')
            ->add('address')
            ->add('phone')
            ->add('fax')
            ->add('email')
            ->add('latitude')
            ->add('longitude')
            ->add('address1')
            ->add('address2')
            ->add('sort')
            ->add('active')
            ->add('backCountry')
            ->add('backBusinessUnitType')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\BackBusinessUnits'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_backbusinessunitstype';
    }
}
