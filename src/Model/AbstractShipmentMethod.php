<?php

namespace Mtt\ShippingBundle\Model;

abstract class AbstractShipmentMethod extends \pdt256\Shipping\Shipment
{
    protected $id;
    protected $title;
    protected $template = '@mtt_shipping/item.html.twig';

    protected $rater;


    public function __construct()
    {
        $this->rater = new NullRater();
    }

    public function setRater(AbstractRate $rater)
    {
        $this->rater = $rater;
    }

    public function getRater(): AbstractRate
    {
        return $this->rater;
    }

    /**
     * @return mixed
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title)
    {
        $this->title = $title;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }


    public function setTemplate(string $template)
    {
        $this->template = $template;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}
