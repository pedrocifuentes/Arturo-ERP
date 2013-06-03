<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PurchaseProposalLogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('docStatus')
            ->add('docAction')
            ->add('createdAt')
            ->add('purchaseProposal')
            ->add('backUsersOld')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\PurchaseProposalLog'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_purchaseproposallogtype';
    }
}
