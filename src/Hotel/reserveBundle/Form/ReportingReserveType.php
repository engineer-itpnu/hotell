<?php

namespace Hotel\reserveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReportingReserveType extends AbstractType
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
            ->add('cust_name','entity', array('class' => 'HotelreserveBundle:customerEntity',
                'property' => 'cust_name','required'=>false,'empty_value' => 'نام مسافر',))
            ->add('cust_family','entity', array('class' => 'HotelreserveBundle:customerEntity',
                'property' => 'cust_family','required'=>false,'empty_value' => 'نام خانوادگی مسافر',))
            ->add('cust_mobile','entity', array('class' => 'HotelreserveBundle:customerEntity',
                'property' => 'cust_mobile','required'=>false,'empty_value' => 'شماره همراه مسافر',))
            ->add('RagencyEntity','entity', array('class' => 'HotelreserveBundle:agencyEntity',
                'property' => 'agency_name','required'=>false,'empty_value' => 'همه آژانس ها',))
            ->add('hotel_city','entity', array('class' => 'HotelreserveBundle:hotelEntity',
                'property' => 'hotel_city','required'=>false,'empty_value' => 'شهر اقامت',))
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
