<?php

namespace Hotel\reserveBundle\Form;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\FormBuilderInterface;

class registerType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('user_firstname')
            ->add('user_family')
            ->add('user_phone')
            ->add('roles','choice', array('choices' => array('ROLE_ADMIN' => 'مدیر سایت', 'ROLE_HOTELDAR' => 'کاربر هتلدار', 'ROLE_AGENCY' => 'کاربر آژانس'),
                'multiple'  => true,))
            ->add('user_mobile')
            ->add('user_city')
            ->add('user_accountNumber')
            ->add('user_cardNumber')
            ->add('user_nameBank')
        ;
    }

    public function getName()
    {
        return 'hotel_user_registration';
    }
}
