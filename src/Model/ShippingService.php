<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class ShippingService extends MandaeObject
{
    /**
     * @var string
     */
    const SHIPPING_SERVICE_ECONOMICO = 'Econômico';

    /**
     * @var string
     */
    const SHIPPING_SERVICE_RAPIDO = 'Rápido';

    /**
     * Name of the Service
     *
     * @var null|string
     */
    public $name;

    /**
     * Days to deliver
     *
     * @var null|integer
     */
    public $days;

    /**
     * Price in BRL
     *
     * @var null|float
     */
    public $price;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return ShippingService
     */
    public function setName(?string $name): ShippingService
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDays(): ?int
    {
        return $this->days;
    }

    /**
     * @param int|null $days
     * @return ShippingService
     */
    public function setDays(?int $days): ShippingService
    {
        $this->days = $days;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return ShippingService
     */
    public function setPrice(?float $price): ShippingService
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'days' => $this->getDays(),
            'price' => $this->getPrice(),
        ];
    }
}
