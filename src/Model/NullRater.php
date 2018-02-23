<?php

namespace Mtt\ShippingBundle\Model;

use \pdt256\Shipping\RateAdapter;
use \pdt256\Shipping\Quote;

class NullRater extends AbstractRate
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }

    protected function validate()
    {
        //$this->validatePackages();
    /*    Validator::checkIfNull($this->key, 'key');
        Validator::checkIfNull($this->password, 'password');
        Validator::checkIfNull($this->accountNumber, 'accountNumber');
        Validator::checkIfNull($this->meterNumber, 'meterNumber');
        Validator::checkIfNull($this->shipment->getFromPostalCode(), 'fromPostalCode');
        Validator::checkIfNull($this->shipment->getFromCountryCode(), 'fromCountryCode');
        Validator::checkIfNull($this->shipment->getFromIsResidential(), 'fromIsResidential');
        Validator::checkIfNull($this->shipment->getToPostalCode(), 'toPostalCode');
        Validator::checkIfNull($this->shipment->getToCountryCode(), 'toCountryCode');
        Validator::checkIfNull($this->shipment->getToIsResidential(), 'toIsResidential');*/

        return $this;
    }

    protected function prepare()
    {
        return $this;
    }

    protected function execute()
    {
        return $this;
    }

    protected function process()
    {
        $quote = new Quote('nova-pochta', 'np', 'np-standart', 50);
        $this->rates[] = $quote;
        return $this;
    }
}
