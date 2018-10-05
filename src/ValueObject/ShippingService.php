<?php

namespace ChicoRei\Packages\Mandae\ValueObject;

use ChicoRei\Packages\Mandae\MandaeObject;

class ShippingService extends MandaeObject
{
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
    public $quantityDays;

    /**
     * Price in BRL
     *
     * @var null|float
     */
    public $price;

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
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
    public function getQuantityDays(): ?int
    {
        return $this->quantityDays;
    }

    /**
     * @param int|null $quantityDays
     * @return ShippingService
     */
    public function setQuantityDays(?int $quantityDays): ShippingService
    {
        $this->quantityDays = $quantityDays;
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

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'quantityDays' => $this->getQuantityDays(),
            'price' => $this->getPrice(),
        ];
    }
}