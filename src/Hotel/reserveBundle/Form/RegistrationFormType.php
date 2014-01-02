<?php
namespace Hotel\reserveBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('user_firstname','text',array('label'=>'نام : ','constraints' => array(
                new NotBlank(),
                new Length(array('max' => 31)))))

            ->add('user_family','text',array('label'=>'نام خانوادگی : ','constraints' => array(
                new NotBlank(),
                new Length(array('max' => 31)))))

            ->add('user_phone','text',array('label'=>'شماره تلفن : ','constraints' => array(
                new NotBlank(),
                new Length(array('min' => 7,'max' => 15)))))

            ->add('roles', 'collection', array('label'=>'نوع کاربر :','type'=>'choice','options'=> array(
                'choices' => array('ROLE_ADMIN' => 'مدیر سایت', 'ROLE_HOTELDAR' => 'کاربر هتلدار', 'ROLE_AGENCY' => 'کاربر آژانس'),
                'multiple'  => false,'expanded' => true )))

            ->add('user_mobile','text',array('label'=>'شماره موبایل : ','constraints' => array(
                new NotBlank(),
                new Length(array('min' => 8,'max' => 15)))))

            ->add('user_city','text',array('label'=>'شهر : ','constraints' => array(
                new NotBlank(),
                new Length(array('max' => 31)))))

            ->add('user_accountNumber','text',array('label'=>'شماره حساب : ','constraints' => array(
                new NotBlank(),
                new Length(array('min' => 7,'max' => 25)))))

            ->add('user_cardNumber','text',array('label'=>'شماره کارت اعتباری : ','constraints' => array(
                new NotBlank(),
                new Length(array('min' => 8,'max' => 25)))))

            ->add('user_nameBank','text',array('label'=>'نام بانک عامل : ','constraints' => array(
                new NotBlank(),
                new Length(array('max' => 31)))));
    }

    public function getName()
    {
        return 'hotel_user_registration';
    }
}

