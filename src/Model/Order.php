<?php

namespace ChicoRei\Packages\Mandae\Model;

use Carbon\Carbon;
use ChicoRei\Packages\Mandae\MandaeObject;

abstract class Order extends MandaeObject
{
    /**
     * Vehicle valid options
     */
    const VEHICLE_CAR = 'Car';
    const VEHICLE_MOTORCYCLE = 'Motorcyle';
    const VEHICLE_Dropff = 'Dropoff';

    /**
     * Id
     *
     * @var null|int
     */
    public $id;

    /**
     * Customer Id
     *
     * @var null|string
     */
    public $customerId;

    /**
     * Scheduling Date
     *
     * @var null|Carbon
     */
    public $scheduling;

    /**
     * New Item
     *
     * @var null|Item[]
     */
    public $items;

    /**
     * Sender
     *
     * @var null|Sender
     */
    public $sender;

    /**
     * Vehicle
     *
     * @var null|string
     */
    public $vehicle;

    /**
     * Label
     *
     * @var null|Sender
     */
    public $label;

    /**
     * Observation
     *
     * @var null|string
     */
    public $observation;

    /**
     * Customer Id
     *
     * @var null|string
     */
    public $partnerOrderId;

    /**
     * @param $array
     * @return static
     */
    public static function createFromArray(array $array = [])
    {
        return new static([
            'id' => $array['id'] ?? null,
            'customerId' => $array['customerId'] ?? null,
            'scheduling' => isset($array['scheduling']) ? Carbon::parse($array['scheduling']) : null,
            'items' => array_map(function ($newItem) {
                return Item::createFromArray($newItem);
            }, $array['items'] ?? []),
            'sender' => Sender::createFromArray($array['sender'] ?? []),
            'vehicle' => $array['vehicle'] ?? null,
            'label' => isset($array['label']) ? Sender::createFromArray($array['label']) : null,
            'observation' => $array['observation'] ?? null,
            'partnerOrderId' => $array['partnerOrderId'] ?? null,
        ]);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return static
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param null|string $customerId
     * @return static
     */
    public function setCustomerId(?string $customerId): self
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getScheduling(): ?Carbon
    {
        return $this->scheduling;
    }

    /**
     * @param Carbon|null $scheduling
     * @return static
     */
    public function setScheduling(?Carbon $scheduling): self
    {
        $this->scheduling = $scheduling;
        return $this;
    }

    /**
     * @return Item[]|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param Item[]|null $items
     * @return static
     */
    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return Sender|null
     */
    public function getSender(): ?Sender
    {
        return $this->sender;
    }

    /**
     * @param Sender|null $sender
     * @return static
     */
    public function setSender(?Sender $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getVehicle(): ?string
    {
        return $this->vehicle;
    }

    /**
     * @param null|string $vehicle
     * @return static
     */
    public function setVehicle(?string $vehicle): self
    {
        $this->vehicle = $vehicle;
        return $this;
    }

    /**
     * @return Sender|null
     */
    public function getLabel(): ?Sender
    {
        return $this->label;
    }

    /**
     * @param Sender|null $label
     * @return static
     */
    public function setLabel(?Sender $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getObservation(): ?string
    {
        return $this->observation;
    }

    /**
     * @param null|string $observation
     * @return static
     */
    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPartnerOrderId(): ?string
    {
        return $this->partnerOrderId;
    }

    /**
     * @param null|string $partnerOrderId
     * @return static
     */
    public function setPartnerOrderId(?string $partnerOrderId): self
    {
        $this->partnerOrderId = $partnerOrderId;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'customerId' => $this->getCustomerId(),
            'scheduling' => $this->getScheduling() ? $this->getScheduling()->toAtomString() : null,  // Atom outputs the correct ISO8601 on any Carbon Version. See: https://github.com/briannesbitt/Carbon/issues/861
            'items' => array_map(function (Item $newItem) {
                return $newItem->toArray();
            }, $this->getItems() ?? []),
            'sender' => $this->getSender() ? $this->getSender()->toArray() : null,
            'vehicle' => $this->getVehicle(),
            'label' => $this->getLabel() ? $this->getLabel()->toArray() : null,
            'observation' => $this->getObservation(),
            'partnerOrderId' => $this->getPartnerOrderId(),
        ];
    }
}