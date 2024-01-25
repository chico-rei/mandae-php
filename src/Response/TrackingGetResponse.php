<?php

namespace ChicoRei\Packages\Mandae\Response;

use ChicoRei\Packages\Mandae\MandaeObject;
use ChicoRei\Packages\Mandae\Model\Event;

class TrackingGetResponse extends MandaeObject
{
    /**
     * Tracking Code
     *
     * @var null|string
     */
    public $trackingCode;

    /**
     * Carrier Code
     *
     * @var null|string
     */
    public $carrierCode;

    /**
     * Carrier Name
     *
     * @var null|string
     */
    public $carrierName;

    /**
     * Id Item Parceiro
     *
     * @var null|string
     */
    public $idItemParceiro;

    /**
     * Partner Item Id
     *
     * @var null|string
     */
    public $partnerItemId;

    /**
     * Tracking Events
     *
     * @var Event[]
     */
    public $events;

    /**
     * @return string|null
     */
    public function getTrackingCode(): ?string
    {
        return $this->trackingCode;
    }

    /**
     * @param string|null $trackingCode
     * @return TrackingGetResponse
     */
    public function setTrackingCode(?string $trackingCode): TrackingGetResponse
    {
        $this->trackingCode = $trackingCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCarrierCode(): ?string
    {
        return $this->carrierCode;
    }

    /**
     * @param string|null $carrierCode
     * @return TrackingGetResponse
     */
    public function setCarrierCode(?string $carrierCode): TrackingGetResponse
    {
        $this->carrierCode = $carrierCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCarrierName(): ?string
    {
        return $this->carrierName;
    }

    /**
     * @param string|null $carrierName
     * @return TrackingGetResponse
     */
    public function setCarrierName(?string $carrierName): TrackingGetResponse
    {
        $this->carrierName = $carrierName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdItemParceiro(): ?string
    {
        return $this->idItemParceiro;
    }

    /**
     * @param string|null $idItemParceiro
     * @return TrackingGetResponse
     */
    public function setIdItemParceiro(?string $idItemParceiro): TrackingGetResponse
    {
        $this->idItemParceiro = $idItemParceiro;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPartnerItemId(): ?string
    {
        return $this->partnerItemId;
    }

    /**
     * @param string|null $partnerItemId
     * @return TrackingGetResponse
     */
    public function setPartnerItemId(?string $partnerItemId): TrackingGetResponse
    {
        $this->partnerItemId = $partnerItemId;
        return $this;
    }

    /**
     * @return Event[]
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }

    /**
     * @param Event[] $events
     * @return TrackingGetResponse
     */
    public function setEvents(array $events): TrackingGetResponse
    {
        $this->events = array_map(function ($event) {
            return Event::create($event);
        }, $events);

        return $this;
    }

    /**
     * @param Event|array $event
     * @return static
     */
    public function addEvent($event)
    {
        if (! is_array($this->events)) {
            $this->events = [];
        }

        $this->events[] = Event::create($event);

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'trackingCode' => $this->getTrackingCode(),
            'carrierCode' => $this->getCarrierCode(),
            'carrierName' => $this->getCarrierName(),
            'idItemParceiro' => $this->getIdItemParceiro(),
            'partnerItemId' => $this->getPartnerItemId(),
            'events' => array_map(function (Event $event) {
                return $event->toArray();
            }, $this->getEvents() ?? []),
        ];
    }
}
