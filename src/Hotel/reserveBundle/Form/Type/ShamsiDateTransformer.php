<?php
namespace Hotel\reserveBundle\Form\Type;

use Hotel\reserveBundle\Handler\DateConvertor;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ShamsiDateTransformer
 * @package Hotel\reserveBundle\Form\Type
 */
class ShamsiDateTransformer implements DataTransformerInterface
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
     * @param \DateTime $miladi
     * @return string
     */
    public function transform($miladi = null)
    {
        return $this->dateconvertor->MiladiToShamsi($miladi);
    }

    /**
     * @param string $shamsi
     * @return \DateTime
     */
    public function reverseTransform($shamsi)
    {
        return $this->dateconvertor->ShamsiToMiladi($shamsi);
    }
} 