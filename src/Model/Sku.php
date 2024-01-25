<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Sku extends MandaeObject
{
    /**
     * Sku Id
     *
     * @var null|string
     */
    public $skuId;

    /**
     * Description
     *
     * @var null|string
     */
    public $description;

    /**
     * Ean
     *
     * @var null|string
     */
    public $ean;

    /**
     * Price
     *
     * @var null|float
     */
    public $price;

    /**
     * Quantity
     *
     * @var null|int
     */
    public $quantity;

    /**
     * @return string|null
     */
    public function getSkuId(): ?string
    {
        return $this->skuId;
    }

    /**
     * @param string|null $skuId
     * @return Sku
     */
    public function setSkuId(?string $skuId): Sku
    {
        $this->skuId = $skuId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Sku
     */
    public function setDescription(?string $description): Sku
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEan(): ?string
    {
        return $this->ean;
    }

    /**
     * @param string|null $ean
     * @return Sku
     */
    public function setEan(?string $ean): Sku
    {
        $this->ean = $ean;
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
     * @return Sku
     */
    public function setPrice(?float $price): Sku
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return Sku
     */
    public function setQuantity(?int $quantity): Sku
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'skuId' => $this->getSkuId(),
            'description' => $this->getDescription(),
            'ean' => $this->getEan(),
            'price' => $this->getPrice(),
            'quantity' => $this->getQuantity(),
        ];
    }
}
