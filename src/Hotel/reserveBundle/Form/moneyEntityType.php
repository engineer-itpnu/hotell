<?php
namespace Hotel\reserveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class moneyEntityType extends AbstractType
{
    private $user;
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('money_price',"text",array('constraints' => array(
                new NotBlank(),
                new Length(array('min' => 2,'max' => 20)))))
            ->add('money_NumBill',"text",array('required'=>true,'constraints' => array(
                new Length(array('min' => 2,'max' => 20)))))
            ->add('money_DateBill',"shamsi_date",array('required'=>true))
            ->add('money_BankName',"text",array('required'=>true,'constraints' => array(
                new Length(array('max' => 31)))))
            ->add('money_branch',"text",array('required'=>true,'constraints' => array(
                new Length(array('max' => 31)))))
            ->add('hotelEntity',null,array('required'=>true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')->where("u.userEntity = :user")->setParameter('user', $this->user);
                }))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hotel\reserveBundle\Entity\moneyEntity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hotel_reservebundle_moneyentity';
    }
}
