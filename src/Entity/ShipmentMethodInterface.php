<?php
declare(strict_types=1);

namespace Mtt\ShippingBundle\Entity;

interface ShipmentMethodInterface
{

    public function getId(): ?int;

    public function getShipmentMethodServiceName():?string;

    public function isActive(): bool;

    public function setActive(bool $active);

    public function getName(): ?string;

    public function setName(string $name);

    public function getTemplate(): ?string;

    /**
     * @param string $template
     */
    public function setTemplate(?string $template);

}

