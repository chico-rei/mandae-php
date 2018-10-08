<?php

namespace ChicoRei\Packages\Mandae\Response;

use ChicoRei\Packages\Mandae\ValueObject\Order;

class OrderAddParcelResponse extends Order
{
    /**
     * OrderAddParcelResponse constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }
}