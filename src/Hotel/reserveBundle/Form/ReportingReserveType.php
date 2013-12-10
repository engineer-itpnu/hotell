<?php

namespace Hotel\reserveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class reportingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('RfromDateTime','shamsi_date',array('required'=>false))
            ->add('RtoDateTime','shamsi_date',array('required'=>false))
            ->add('customerEntity','entity', array('class' => 'HotelreserveBundle:customerEntity',
                'required'=>false,'empty_value' => 'همه مسافران',))
            ->add('RagencyEntity','entity', array('class' => 'HotelreserveBundle:agencyEntity',
                'property' => 'agency_name','required'=>false,'empty_value' => 'همه آژانس ها',))
            ->add('RhotelEntity','entity', array('class' => 'HotelreserveBundle:hotelEntity',
                'property' => 'hotel_name','required'=>false,'empty_value' => 'همه هتل ها ',))
        ;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'hotel_reservebundle_moneyentity';
    }
}
