<?php

namespace Hotel\reserveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class accountEntityType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price')
            ->add('type','choice', array('choices' => array('0' => 'واریز', '1' => 'برداشت', '2' => 'خرید'),
                'multiple'  => true,))
            ->add('StockHotel')
            ->add('StockAgency')
            ->add('NumberPey')
            ->add('DateTime')
            ->add('hotelEntity')
            ->add('agencyEntity')
            ->add('customerEntity')
            ->add('reserveEntity')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hotel\reserveBundle\Entity\accountEntity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hotel_reservebundle_accountentity';
    }
}
