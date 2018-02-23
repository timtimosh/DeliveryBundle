<?php
declare(strict_types=1);
namespace Mtt\ShippingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="mtt_shipping_shipment_methods")
 */

class ShipmentMethod implements ShipmentMethodInterface
{
    const ACTIVE = 1;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    protected $name;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $shipmentMethodServiceName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $template = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    protected $active = self::ACTIVE;

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getShipmentMethodServiceName():?string
    {
        return $this->shipmentMethodServiceName;
    }

    /**
     * @param string $shipmentMethodServiceName
     */
    public function setShipmentMethodServiceName(string $shipmentMethodServiceName)
    {
        $this->shipmentMethodServiceName = $shipmentMethodServiceName;
    }



    /**
     * @return bool
     */
    public function isActive():bool
    {
        return $this->active ? true: false;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(?string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTemplate():?string
    {
        return $this->template;
    }

    /**
     * @param string $template
     */
    public function setTemplate(?string $template)
    {
        $this->template = $template;
    }


}

