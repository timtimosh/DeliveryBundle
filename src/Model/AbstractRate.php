<?php

namespace Mtt\ShippingBundle\Model;

use \pdt256\Shipping\RateAdapter;

abstract class AbstractRate extends RateAdapter
{
    public function getRates(){
        $this->rates = [];
        return parent::getRates();
    }
}
