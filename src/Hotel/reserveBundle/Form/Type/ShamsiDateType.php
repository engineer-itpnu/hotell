<?php
namespace Hotel\reserveBundle\Form\Type;

use Hotel\reserveBundle\Handler\DateConvertor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

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