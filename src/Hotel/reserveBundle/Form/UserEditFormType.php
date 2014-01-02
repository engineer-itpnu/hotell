<?php
namespace Hotel\reserveBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


class UserEditFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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
                new Length(array('max' => 31)))))

            ->add('username', 'text', array('label' => 'نام کاربری :','constraints' => array(
                new NotBlank(),
                new Length(array('max' => 255)))))

            ->add('email', 'email', array('label' => 'ایمیل :','constraints' => array(
                new NotBlank(),
                new Length(array('max' => 255)))))

            ->add('enabled','checkbox',array('label'=>'فعال بودن کاربر : ','required'=>false))
        ;
    }

    public function getName()
    {
        return 'hotel_user_profile_edit';
    }
}

