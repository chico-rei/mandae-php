<?php

namespace ChicoRei\Packages\Mandae\Response;

use ChicoRei\Packages\Mandae\Model\Order;

class OrderAddParcelResponse extends Order
{
    /**
     * Id
     *
     * @var null|int
     */
    public ?int $id;

    /**
     * Vehicle
     *
     * @var null|string
     */
    public ?string $vehicle;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return OrderAddParcelResponse
     */
    public function setId(?int $id): OrderAddParcelResponse
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVehicle(): ?string
    {
        return $this->vehicle;
    }

    /**
     * @param string|null $vehicle
     * @return OrderAddParcelResponse
     */
    public function setVehicle(?string $vehicle): OrderAddParcelResponse
    {
        $this->vehicle = $vehicle;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'id' => $this->getId(),
            'vehicle' => $this->getVehicle(),
        ]);
    }
}
