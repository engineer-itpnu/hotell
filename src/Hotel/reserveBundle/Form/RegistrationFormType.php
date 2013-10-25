<?php

namespace Hotel\reserveBundle\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;


class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('user_firstname','text',array('label'=>'نام : '));
        $builder->add('user_family','text',array('label'=>'نام خانوادگی : '));
        $builder->add('user_phone','number',array('label'=>'شماره تلفن : '));
        $builder->add('roles', 'choice', array('label'=>'متعلق به کاربر : ',
            'choices' => array('ROLE_ADMIN' => 'مدیر سایت', 'ROLE_HOTELDAR' => 'کاربر هتلدار', 'ROLE_AGENCY' => 'کاربر آژانس'),
            'multiple'  => true,));
        $builder->add('user_mobile','text',array('label'=>'شماره موبایل : '));
        $builder->add('user_city','text',array('label'=>'شهر : '));
        $builder->add('user_accountNumber','text',array('label'=>'شماره حساب : '));
        $builder->add('user_cardNumber','text',array('label'=>'شماره کارت اعتباری : '));
        $builder->add('user_nameBank','text',array('label'=>'نام بانک عامل : '));
    }

    public function getName()
    {
        return 'hotel_user_registration';
    }
}

