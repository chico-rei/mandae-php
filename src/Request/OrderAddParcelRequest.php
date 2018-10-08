<?php

namespace ChicoRei\Packages\Mandae\Request;

use ChicoRei\Packages\Mandae\IRequest;
use ChicoRei\Packages\Mandae\ValueObject\Order;

class OrderAddParcelRequest extends Order implements IRequest
{
    /**
     * OrderAddParcelRequest constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getPath(): string
    {
        return 'orders/add-parcel';
    }

    public function getPayload(): ?array
    {
        return $this->toArray();
    }
}