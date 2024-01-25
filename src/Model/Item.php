<?php

namespace ChicoRei\Packages\Mandae\Model;

class Item extends Dimensions
{
    /**
     * Quantity
     *
     * @var int|null
     */
    public $quantity;

    /**
     * Declared Value in BRL
     *
     * @var float|null
     */
    public $declaredValue;

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return $this
     */
    public function setQuantity(?int $quantity): Item
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getDeclaredValue(): ?float
    {
        return $this->declaredValue;
    }

    /**
     * @param float|null $declaredValue
     * @return Item
     */
    public function setDeclaredValue(?float $declaredValue): Item
    {
        $this->declaredValue = $declaredValue;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'quantity' => $this->getQuantity(),
            'declaredValue' => $this->getDeclaredValue(),
        ]);
    }
}
