<?php

namespace Mtt\ShippingBundle\Service;

use Mtt\ShippingBundle\Model\AbstractShipmentMethod;

interface ShippingServiceInterface
{
    public function getAviableShipmentMethods(): ?array;

    public function calculateShipmentRates(AbstractShipmentMethod $shipment, array $options = []): ?array;
}
