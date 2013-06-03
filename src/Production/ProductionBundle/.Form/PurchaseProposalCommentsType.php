<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PurchaseProposalCommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comments')
            ->add('createdAt')
            ->add('purchaseProposal')
            ->add('backUsersOld')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\PurchaseProposalComments'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_purchaseproposalcommentstype';
    }
}
