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
            ->add('type','choice', array('choices' => array('1' => 'خرید', '2' => 'برداشت', '3' => 'واریز'),
                'required'=>false,'empty_value' => 'همه انواع ',
            ))
            ->add('fromDateTime','shamsi_date',array('required'=>false))
            ->add('toDateTime','shamsi_date',array('required'=>false))
            ->add('hotelEntity','entity', array('class' => 'HotelreserveBundle:hotelEntity',
                'property' => 'hotel_name','required'=>false,'empty_value' => 'همه هتل ها ',))
            ->add('agencyEntity','entity', array('class' => 'HotelreserveBundle:agencyEntity',
                'property' => 'agency_name','required'=>false,'empty_value' => 'همه آژانس ها',))
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
