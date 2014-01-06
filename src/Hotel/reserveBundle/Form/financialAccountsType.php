<?php
namespace Hotel\reserveBundle\Form;

use Doctrine\ORM\EntityRepository;
use Hotel\reserveBundle\Entity\userEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class financialAccountsType extends AbstractType
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
        $builder
            ->add('type','choice', array('choices' => array('1' => 'خرید', '2' => 'برداشت', '3' => 'واریز'),
                'required'=>false,'empty_value' => 'همه انواع ',
            ))
            ->add('fromDateTime','shamsi_date',array('required'=>false))
            ->add('toDateTime','shamsi_date',array('required'=>false))
            ->add('agencyEntity','entity', array('class' => 'HotelreserveBundle:agencyEntity',
                'property' => 'agency_name','required'=>false,'empty_value' => 'همه آژانس ها',
                'query_builder' => function (EntityRepository $er) {
                    $er = $er->createQueryBuilder('u');
                    if($this->user && $this->user->hasRole("ROLE_AGENCY")) $er->where("u.userEntity = :user")->setParameter("user",$this->user);
                    return $er;
                }
            ))
            ->add('hotel_city','entity', array('class' => 'HotelreserveBundle:hotelEntity',
                'property' => 'hotel_city','required'=>false,'empty_value' => 'همه شهرها',
                'query_builder' => function (EntityRepository $er) {
                        $er = $er->createQueryBuilder('u');
                        if($this->user && $this->user->hasRole("ROLE_HOTELDAR")) $er->where("u.userEntity = :user")->setParameter("user",$this->user);
                        return $er->groupBy("u.hotel_city");
                }))
            ->add('hotelEntity','entity', array('class' => 'HotelreserveBundle:hotelEntity',
                    'property' => 'hotel_name','required'=>false,'empty_value' => 'همه هتل ها'
                ))
        ;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'hotel_reservebundle_moneyentity';
    }
}
