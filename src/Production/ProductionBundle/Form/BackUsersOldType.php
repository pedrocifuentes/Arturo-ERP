<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BackUsersOldType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password')
            ->add('nickname')
            ->add('email')
            ->add('active')
            ->add('docStatus')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('backBusinessUnit')
            ->add('backProfiles')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\BackUsersOld'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_backusersoldtype';
    }
}
