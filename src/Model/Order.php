<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

abstract class Order extends MandaeObject
{
    /**
     * Customer Id
     *
     * @var string
     */
    public string $customerId;

    /**
     * New NewItem
     *
     * @var null|NewItem[]
     */
    public $items;

    /**
     * Seller Id
     *
     * @var null|string
     */
    public $sellerId;

    /**
     * Observation
     *
     * @var null|string
     */
    public $observation;

    /**
     * @return string
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param string $customerId
     * @return static
     */
    public function setCustomerId(string $customerId): Order
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return NewItem[]|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param NewItem[]|null $items
     * @return static
     */
    public function setItems(?array $items)
    {
        $this->items = array_map(function ($item) {
            return NewItem::create($item);
        }, $items);

        return $this;
    }

    /**
     * @param NewItem|array $item
     * @return static
     */
    public function addItem($item)
    {
        if (! is_array($this->items)) {
            $this->items = [];
        }

        $this->items[] = NewItem::create($item);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSellerId(): ?string
    {
        return $this->sellerId;
    }

    /**
     * @param string|null $sellerId
     * @return static
     */
    public function setSellerId(?string $sellerId): Order
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getObservation(): ?string
    {
        return $this->observation;
    }

    /**
     * @param string|null $observation
     * @return static
     */
    public function setObservation(?string $observation): Order
    {
        $this->observation = $observation;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'customerId' => $this->getCustomerId(),
            'items' => array_map(function (NewItem $newItem) {
                return $newItem->toArray();
            }, $this->getItems() ?? []),
            'sellerId' => $this->getSellerId(),
            'observation' => $this->getObservation(),
        ];
    }
}
