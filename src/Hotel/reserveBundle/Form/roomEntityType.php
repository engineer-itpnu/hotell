<?php

namespace Hotel\reserveBundle\Form;

use Hotel\reserveBundle\Controller\ServiceController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class roomEntityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('room_name', null, array('constraints' => array(
                new NotBlank(),
                new Length(array('max' => 63)))))

            ->add('room_capacity', null, array('constraints' => array(
                new NotBlank())))

            ->add('room_addCapacity', null, array('constraints' => array(
                new NotBlank())))

            ->add('room_type', 'choice', array('choices' => ServiceController::roomTypes()));
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