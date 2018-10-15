<?php

namespace ChicoRei\Packages\Mandae\Request;

use ChicoRei\Packages\Mandae\IRequest;
use ChicoRei\Packages\Mandae\Model\Order;

class OrderAddParcelRequest extends Order implements IRequest
{
    /**
     * Async
     *
     * @var bool
     */
    public $async;

    /**
     * OrderAddParcelRequest constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return static
     */
    public static function createFromArray(array $array = [])
    {
        /** @var OrderAddParcelRequest $self */
        $self = parent::createFromArray($array);
        $self->setAsync($array['async'] ?? false);

        return $self;
    }

    /**
     * @return bool
     */
    public function getAsync(): bool
    {
        return $this->async;
    }

    /**
     * @param bool $async
     * @return OrderAddParcelRequest
     */
    public function setAsync(bool $async): OrderAddParcelRequest
    {
        $this->async = $async;
        return $this;
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

    public function toArray(): array
    {
        return array_merge(['async' => $this->getAsync()], parent::toArray());
    }
}