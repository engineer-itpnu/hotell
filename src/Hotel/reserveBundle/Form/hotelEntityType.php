<?php

namespace Hotel\reserveBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
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
            ->add('hotel_name',null,array('constraints' => array(
                new NotBlank(),
                new Length(array('max' => 63)))))

            ->add('hotel_manageName',null,array('constraints' => array(
                new NotBlank(),
                new Length(array('max' => 63)))))

            ->add('hotel_grade',null,array('constraints' => array(
                new NotBlank(),
                new Length(array('max' => 7)))))

            ->add('hotel_city',null,array('constraints' => array(
                new NotBlank(),
                new Length(array('max' => 31)))))

            ->add('hotel_zipcode','text',array('constraints' => array(
                new NotBlank(),
                new Length(array('min' => 8,'max' => 20)))))

            ->add('hotel_email','email',array('constraints' => array(
                new Email(),
                new NotBlank(),
                new Length(array('max' => 63)))))

            ->add('hotel_phone',null,array('constraints' => array(
                new NotBlank(),
                new Length(array('min' => 7,'max' => 20)))))

            ->add('hotel_mobile',null,array('constraints' => array(
                new NotBlank(),
                new Length(array('min' => 8,'max' => 20)))))

            ->add('hotel_addRoomTtariff',null,array('constraints' => array(
                new NotBlank(),
                new Length(array('min' => 2,'max' => 20)))))

            ->add('hotel_active', 'choice', array(
                'choices' => array('1' => 'دسترسی فعال', '0' => 'دسترسی غیرفعال')))

            ->add('userEntity', null, array(
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')->where("u.roles like :role")->setParameter('role', '%ROLE_HOTELDAR%');
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
