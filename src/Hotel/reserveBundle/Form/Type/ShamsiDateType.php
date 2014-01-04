<?php
namespace Hotel\reserveBundle\Form\Type;

use Hotel\reserveBundle\Handler\DateConvertor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ShamsiDateType
 * @package Hotel\reserveBundle\Form\Type
 */
class ShamsiDateType extends AbstractType
{
    /**
     * @var DateConvertor
     */
    private $dateconvertor;

    /**
     * @param DateConvertor $dc
     */
    public function __construct(DateConvertor $dc)
    {
        $this->dateconvertor = $dc;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new ShamsiDateTransformer($this->dateconvertor);
        $builder->addModelTransformer($transformer);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'invalid_message' => 'تاریخ وارد شده اشتباه است',
        ));
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return 'text';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'shamsi_date';
    }
} 