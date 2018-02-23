<?php

namespace Mtt\ShippingBundle\Model\NovaPoshta;


use Mtt\ShippingBundle\Model\AbstractShipmentMethod;

class NPShipmentMethod extends AbstractShipmentMethod
{

    protected $template = '@mtt_shipping/nova_poshta/item.html.twig';
}
