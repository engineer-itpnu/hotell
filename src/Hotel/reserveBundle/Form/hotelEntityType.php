<?php

namespace Hotel\reserveBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

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
            ->add('hotel_zipcode','text',array('constraints' => array(
                new NotBlank(),
                new Length(array('min' => 8,'max' => 13)))))
            ->add('hotel_email')
            ->add('hotel_phone','text',array('constraints' => array(
                new NotBlank(),
                new Length(array('min' => 7,'max' => 15)))))
            ->add('hotel_mobile','text',array('constraints' => array(
        new NotBlank(),
        new Length(array('min' => 8,'max' => 14)))))
            ->add('hotel_addRoomTtariff','text',array('constraints' => array(
                new NotBlank(),
                new Length(array('min' => 2,'max' => 30)))))
            ->add('hotel_active', 'choice', array(
                'choices' => array('1' => 'دسترسی فعال', '0' => 'دسترسی غیرفعال')))
            ->add('userEntity', null, array(
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')->where("u.roles like :role")->setParameter('role', '%ROLE_HOTELDAR%');
                }
            ));
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
