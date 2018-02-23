<?php

namespace Mtt\ShippingBundle\Model\SelfDelivery;


use Mtt\ShippingBundle\Model\AbstractShipmentMethod;

class SDShipmentMethod extends AbstractShipmentMethod
{
    protected $template = '@mtt_shipping/self_delivery/item.html.twig';
}
