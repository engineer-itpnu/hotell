<?php

namespace Hotel\reserveBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class hotelEntityType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hotel_name')
            ->add('hotel_manageName')
            ->add('hotel_grade')
            ->add('hotel_city')
            ->add('hotel_zipcode')
            ->add('hotel_email')
            ->add('hotel_phone')
            ->add('hotel_mobile')
            ->add('hotel_addRoomTtariff')
//            ->add('hotel_active')
            ->add('userEntity',null,array(
                'query_builder' => function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('u')->where("u.roles like :role")->setParameter('role','%ROLE_HOTELDAR%');
                }
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hotel\reserveBundle\Entity\hotelEntity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hotel_reservebundle_hotelentity';
    }
}
