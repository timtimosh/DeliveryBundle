<?php

namespace Mtt\ShippingBundle\Service;


use Mtt\ShippingBundle\Entity;
use pdt256\Shipping\Quote;

class ShippmentService
{
    protected $entityRepository;

    public function __construct($entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    public function buildForm($shippment)
    {
        $formNamespace = $this->getShippingNamespace($shippment);
        $form = new ($formNamespace . '\Form');
        $form->build();
    }

    /**
     * @param $shippment
     * @param array $options
     * @return Quote[]
     */
    public function calculateShippmentRates($shippment, array $options = []):array{
        $options['shipment'] = $shippment;

        $rateNamespace = $this->getShippingNamespace($shippment);
        $rate = new ($formNamespace . '\Rate')($options);
        return $rate->getRates();
    }

    /**
     * @return \Mtt\ShippingBundle\AbstractShipping[]|null
     */
    public function getShippingMethods():?array{
        return $this->entityRepository->findByActive(Entity\Shipping::ACTIVE);
    }

    protected function getShippingNamespace($shippment):string{
        $class = new \ReflectionClass($shippment);
        return $class->getNamespaceName();
    }
}