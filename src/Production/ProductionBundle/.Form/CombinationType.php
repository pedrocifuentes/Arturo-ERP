<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CombinationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('active')
            ->add('name')
            ->add('catalogo')
            ->add('updatedAt')
            ->add('backColors')
            ->add('backModels')
            ->add('backSizes')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\Combination'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_combinationtype';
    }
}
