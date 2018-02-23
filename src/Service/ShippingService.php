<?php

namespace Mtt\ShippingBundle\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Mtt\ShippingBundle\Entity\ShipmentMethodInterface;
use Mtt\ShippingBundle\Entity;
use Mtt\ShippingBundle\Model\AbstractRate;
use Mtt\ShippingBundle\Model\AbstractShipmentMethod;
use pdt256\Shipping\Quote;

class ShippingService implements ShippingServiceInterface
{
    protected $entityRepository;
    protected $shipmentMethods;

    /**
     * ShippingService constructor.
     * @param $entityRepository EntityManagerInterface ShipmentMethod repository
     */
    public function __construct(\Doctrine\ORM\EntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
        $this->shipmentMethods = new ArrayCollection();
    }

    public function addShipmentMethod(string $shipmentServiceNameInConfig, AbstractShipmentMethod $shipment)
    {
        $this->shipmentMethods->set($shipmentServiceNameInConfig, $shipment);
    }

    /**
     * @param $shippment AbstractShipmentMethod
     * @param array $options
     * @return Quote[]
     */
    public function calculateShipmentRates(AbstractShipmentMethod $shipment, array $options = []): ?array
    {
        $rater = $shipment->getRater();
        $rater->setShipment($shipment);
        $rater->setIsProduction( (bool) \pdt256\Shipping\Arr::get($options, 'prod', false));

        return $rater->getRates();
    }

    /**
     * @return \Mtt\ShippingBundle\Model\AbstractShipmentMethod[]|null
     */
    public function getAviableShipmentMethods(): ?array
    {
        $shipmentMethods = [];
        foreach ($this->getAviableShipmentMethodsFromDatabase() as $shippingMethodEntity) {
            if ($this->shipmentMethods->containsKey($shippingMethodEntity->getShipmentMethodServiceName())) {
                $shipmentMethods[] = $this->createShipmentMethodFrowDatabaseRow($shippingMethodEntity);
            }
        }
        return $shipmentMethods;
    }

    /**
     * @return ShipmentMethodInterface[]|null
     */
    protected function getAviableShipmentMethodsFromDatabase(): ?array
    {
        return $this->entityRepository->findByActive(Entity\ShipmentMethod::ACTIVE);
    }

    protected function createShipmentMethodFrowDatabaseRow(ShipmentMethodInterface $shippingMethodEntity): AbstractShipmentMethod
    {
        $shiment = $this->shipmentMethods->get($shippingMethodEntity->getShipmentMethodServiceName());

        $shiment->setTitle($shippingMethodEntity->getName());
        $shiment->setId($shippingMethodEntity->getId());
        if (null !== $shippingMethodEntity->getTemplate()) {
            $shiment->setTemplate($shippingMethodEntity->getTemplate());
        }
        return $shiment;
    }
}