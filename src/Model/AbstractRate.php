<?php

namespace Mtt\ShippingBundle;

use \pdt256\Shipping\RateAdapter;

abstract class AbstractRate extends RateAdapter
{
    protected abstract function getRate(array $options);

    public function calculateShippment(array $options){
        return $this->getRate($options);
    }
}
