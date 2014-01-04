<?php

namespace Hotel\reserveBundle\Form;

use Doctrine\ORM\EntityRepository;
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
            ->add('cust_name','text', array('required'=>false))
            ->add('cust_family','text', array('required'=>false))
            ->add('cust_mobile','text', array('required'=>false))
            ->add('CodePey','text', array('required'=>false))
            ->add('Voucher','text', array('required'=>false))
            ->add('ReserveType','choice', array('choices' => array('1' => 'پیش رزرو', '2' => 'رزرو نهایی'),
                'required'=>false,'empty_value' => 'همه انواع',
            ))
            ->add('RagencyEntity','entity', array('class' => 'HotelreserveBundle:agencyEntity',
                'property' => 'agency_name','required'=>false,'empty_value' => 'همه آژانس ها',))
            ->add('hotel_city','entity', array('class' => 'HotelreserveBundle:hotelEntity',
                'property' => 'hotel_city','required'=>false,'empty_value' => 'همه شهرها',
                'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')->groupBy("u.hotel_city");
                    }))
            ->add('RhotelEntity','entity', array('class' => 'HotelreserveBundle:hotelEntity',
                    'property' => 'hotel_name','required'=>false,'empty_value' => 'همه هتل ها'
                ))
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
