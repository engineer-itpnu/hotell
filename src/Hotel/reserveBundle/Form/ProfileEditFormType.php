<?php

namespace Hotel\reserveBundle\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ProfileEditFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('user_firstname',null,array('label'=>'نام : '));
        $builder->add('user_family',null,array('label'=>'نام خانوادگی : '));
        $builder->add('user_phone',null,array('label'=>'شماره تلفن : '));
        $builder->add('roles', 'choice', array('label'=>'متعلق به کاربر : ',
            'choices' => array('ROLE_ADMIN' => 'مدیر سایت', 'ROLE_HOTELDAR' => 'کاربر هتلدار', 'ROLE_AGENCY' => 'کاربر آژانس'),
            'multiple'  => true,));
        $builder->add('user_mobile',null,array('label'=>'شماره موبایل : '));
        $builder->add('user_city',null,array('label'=>'شهر : '));
        $builder->add('user_accountNumber',null,array('label'=>'شماره حساب : '));
        $builder->add('user_cardNumber',null,array('label'=>'شماره کارت اعتباری : '));
        $builder->add('user_nameBank',null,array('label'=>'نام بانک عامل : '));
        $builder->add('enabled',null,array('label'=>'فعال بودن کاربر : ','required'=>false));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'Hotel\reserveBundle\Entity\userentity'
            ));
    }

    public function getName()
    {
        return 'hotel_user_registration';
    }
}
