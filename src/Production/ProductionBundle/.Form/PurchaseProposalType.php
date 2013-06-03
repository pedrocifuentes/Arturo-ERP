<?php

namespace Production\ProductionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PurchaseProposalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('docNo')
            ->add('docNavisionId')
            ->add('docPieces')
            ->add('docDate')
            ->add('docStatus')
            ->add('docDelete')
            ->add('acceptedDate')
            ->add('paymentDate')
            ->add('paymentExchange')
            ->add('backUsersOld')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Production\ProductionBundle\Entity\PurchaseProposal'
        ));
    }

    public function getName()
    {
        return 'production_productionbundle_purchaseproposaltype';
    }
}
