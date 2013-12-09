<?php

namespace Hotel\reserveBundle\Form;

use Doctrine\ORM\EntityRepository;
use Hotel\reserveBundle\Entity\userEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class agencyEntityType extends AbstractType
{
    private $user;
    public function __construct(userEntity $_user = null)
    {
        $this->user = $_user;
    }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $this->user;
        $builder
//            ->add('agency_active')
            ->add('agency_name')
            ->add('userEntity', null, array(
                'query_builder' => function (EntityRepository $er) use ($user) {
                        $qb = $er->createQueryBuilder('u');
                        $qb ->where("u.roles like :role")->setParameter('role', '%ROLE_AGENCY%')
                            ->andWhere("u NOT IN (".
                                $er->createQueryBuilder("users")
                                    ->where("users.id != :myuser")
                                    ->innerJoin("users.agencyEntity","agency")
                                    ->getDQL()
                            .")")->setParameter("myuser",$user?$user->getId():-1)
                        ;
                        return $qb;
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
            'data_class' => 'Hotel\reserveBundle\Entity\agencyEntity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hotel_reservebundle_agencyentity';
    }
}
