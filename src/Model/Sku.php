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
     * Freight
     *
     * @var null|float
     */
    public $freight;

    /**
     * Quantity
     *
     * @var null|int
     */
    public $quantity;

    /**
     * Sku constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return Sku
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'skuId' => $array['skuId'] ?? null,
            'description' => $array['description'] ?? null,
            'ean' => $array['ean'] ?? null,
            'price' => $array['price'] ?? null,
            'freight' => $array['freight'] ?? null,
            'quantity' => $array['quantity'] ?? null,
        ]);
    }

    /**
     * @return null|string
     */
    public function getSkuId(): ?string
    {
        return $this->skuId;
    }

    /**
     * @param null|string $skuId
     * @return Sku
     */
    public function setSkuId(?string $skuId): Sku
    {
        $this->skuId = $skuId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     * @return Sku
     */
    public function setDescription(?string $description): Sku
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEan(): ?string
    {
        return $this->ean;
    }

    /**
     * @param null|string $ean
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
     * @return float|null
     */
    public function getFreight(): ?float
    {
        return $this->freight;
    }

    /**
     * @param float|null $freight
     * @return Sku
     */
    public function setFreight(?float $freight): Sku
    {
        $this->freight = $freight;
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

    public function toArray(): array
    {
        return [
            'skuId' => $this->getSkuId(),
            'description' => $this->getDescription(),
            'ean' => $this->getEan(),
            'price' => $this->getPrice(),
            'freight' => $this->getFreight(),
            'quantity' => $this->getQuantity(),
        ];
    }
}
