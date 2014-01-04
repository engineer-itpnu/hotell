<?php

namespace Hotel\reserveBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;

class reportingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type','choice', array('choices' => array('1' => 'خرید', '2' => 'برداشت', '3' => 'واریز'),
                'required'=>false,'empty_value' => 'همه انواع ',
            ))
            ->add('fromDateTime','shamsi_date',array('required'=>false))
            ->add('toDateTime','shamsi_date',array('required'=>false))
            ->add('agencyEntity','entity', array('class' => 'HotelreserveBundle:agencyEntity',
                'property' => 'agency_name','required'=>false,'empty_value' => 'همه آژانس ها',))
            ->add('hotel_city','entity', array('class' => 'HotelreserveBundle:hotelEntity',
                'property' => 'hotel_city','required'=>false,'empty_value' => 'همه شهرها',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')->groupBy("u.hotel_city");
                }))
            ->add('hotelEntity','entity', array('class' => 'HotelreserveBundle:hotelEntity',
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
