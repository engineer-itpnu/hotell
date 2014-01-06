<?php

namespace Hotel\reserveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class customerEntityType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cust_name','text',array('constraints' => array(
                new NotBlank(),
                new Length(array('max' => 31)))))
            ->add('cust_family','text',array('constraints' => array(
                new NotBlank(),
                new Length(array('max' => 31)))))
            ->add('cust_email','email',array('constraints' => array(
                new Email(),
                new NotBlank(),
                new Length(array('max' => 63)))))
            ->add('cust_phone','text',array('constraints' => array(
                new NotBlank(),
                new Length(array('min' => 7,'max' => 20)))))
            ->add('cust_mobile','text',array('constraints' => array(
                new NotBlank(),
                new Length(array('min' => 7,'max' => 20)))))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hotel\reserveBundle\Entity\customerEntity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hotel_reservebundle_customerentity';
    }
}
