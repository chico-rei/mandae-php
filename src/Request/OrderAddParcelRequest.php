<?php

namespace ChicoRei\Packages\Mandae\Request;

use ChicoRei\Packages\Mandae\IRequest;
use ChicoRei\Packages\Mandae\Model\Order;

class OrderAddParcelRequest extends Order implements IRequest
{
    public function getMethod(): string
    {
        return 'POST';
    }

    public function getPath(): string
    {
        return 'v2/orders/add-parcel';
    }

    public function getPayload(): ?array
    {
        return $this->toArray();
    }
}
