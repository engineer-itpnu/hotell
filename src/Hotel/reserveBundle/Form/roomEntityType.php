<?php

namespace Hotel\reserveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class roomEntityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder->add('room_name');
        $builder->add('room_capacity');
        $builder->add('room_addCapacity');
        $builder->add('room_type', 'choice', array(
            'choices' => array('1' => 'سوئيت vip', '2' => 'سوئيت جونيور',
                '3' => 'سوئيت پرزيدنت', '4' => 'سوئيت رويال'
            , '5' => 'سوئيت امپريال', '6' => 'سوئيت لاکچري', '7' => 'سوئيت دوبلکس', '8' => 'سوئيت لوکس', '9' => 'پرنسس روم', '10' => 'پرزيدنتال', 'l1' => 'تريپل', '12' => 'سينگل', '13' => 'دبل', '14' => 'کانکت روم', '15' => 'آپارتمان', '16' => 'آپارتمان رويال','17' => 'سوئيت')));

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hotel\reserveBundle\Entity\roomEntity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hotel_reservebundle_roomentity';
    }
}
