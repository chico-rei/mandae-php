<?php

namespace ChicoRei\Packages\Mandae\Request;

use ChicoRei\Packages\Mandae\IRequest;
use ChicoRei\Packages\Mandae\MandaeObject;

class OrderCancelRequest extends MandaeObject implements IRequest
{
    /**
     * Order ID
     *
     * @var integer
     */
    public $orderId;

    /**
     * OrderCancelRequest constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     * @return OrderCancelRequest
     */
    public function setOrderId(int $orderId): OrderCancelRequest
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getPath(): string
    {
        return sprintf('orders/%s', $this->getOrderId());
    }

    public function getPayload(): ?array
    {
        return null;
    }

    public function toArray(): array
    {
        return [
            'orderId' => $this->getOrderId()
        ];
    }
}
