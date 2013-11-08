<?php

namespace Hotel\reserveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class moneyEntityType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('money_type', 'choice', array(
                'choices' => array('0' => 'برداشت مبلغ', '1' => 'واریز مبلغ')))
            ->add('money_price')
            ->add('money_DateReq')
            ->add('money_DateReply')
            ->add('money_status')
            ->add('money_NumBill')
            ->add('money_DateBill')
            ->add('money_BankName')
            ->add('money_branch')
            ->add('userEntity')
            ->add('hotelEntity')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hotel\reserveBundle\Entity\moneyEntity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hotel_reservebundle_moneyentity';
    }
}
