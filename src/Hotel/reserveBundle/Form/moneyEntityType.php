<?php

namespace Hotel\reserveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class moneyEntityType extends AbstractType
{
    private $user;
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $this->user;
        $builder
            ->add('money_price')
            ->add('money_NumBill')
            ->add('money_DateBill',"shamsi_date")
            ->add('money_BankName')
            ->add('money_branch')
            ->add('hotelEntity',null,array(
                'query_builder' => function (EntityRepository $er) use ($user) {

                    return $er->createQueryBuilder('u')->where("u.userEntity = :user")->setParameter('user', $user);
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
