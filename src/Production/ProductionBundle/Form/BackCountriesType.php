<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BackCountriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code')
            ->add('latitude')
            ->add('longitude')
            ->add('address')
            ->add('zoom')
            ->add('catalog')
            ->add('email')
            ->add('active')
            ->add('backLanguage')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\BackCountries'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_backcountriestype';
    }
}
