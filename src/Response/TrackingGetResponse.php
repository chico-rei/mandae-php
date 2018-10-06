<?php

namespace ChicoRei\Packages\Mandae\Response;

use ChicoRei\Packages\Mandae\MandaeObject;
use ChicoRei\Packages\Mandae\ValueObject\Event;

class TrackingGetResponse extends MandaeObject
{
    /**
     * Tracking Code
     *
     * @var string
     */
    public $trackingCode;

    /**
     * Carrier Code
     *
     * @var string
     */
    public $carrierCode;

    /**
     * Carrier Name
     *
     * @var string
     */
    public $carrierName;

    /**
     * Tracking Events
     *
     * @var Event[]
     */
    public $events;

    /**
     * TrackingGetResponse constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return TrackingGetResponse
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'trackingCode' => $array['trackingCode'],
            'carrierCode' => $array['carrierCode'],
            'carrierName' => $array['carrierName'],
            'events' => array_map(function ($event) {
                return Event::createFromArray($event);
            }, $array['events'] ?? []),
        ]);
    }

    /**
     * @return string
     */
    public function getTrackingCode(): string
    {
        return $this->trackingCode;
    }

    /**
     * @param string $trackingCode
     * @return TrackingGetResponse
     */
    public function setTrackingCode(string $trackingCode): TrackingGetResponse
    {
        $this->trackingCode = $trackingCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCarrierCode(): string
    {
        return $this->carrierCode;
    }

    /**
     * @param string $carrierCode
     * @return TrackingGetResponse
     */
    public function setCarrierCode(string $carrierCode): TrackingGetResponse
    {
        $this->carrierCode = $carrierCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCarrierName(): string
    {
        return $this->carrierName;
    }

    /**
     * @param string $carrierName
     * @return TrackingGetResponse
     */
    public function setCarrierName(string $carrierName): TrackingGetResponse
    {
        $this->carrierName = $carrierName;
        return $this;
    }

    /**
     * @return Event[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @param Event[] $events
     * @return TrackingGetResponse
     */
    public function setEvents(array $events): TrackingGetResponse
    {
        $this->events = $events;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'trackingCode' => $this->getTrackingCode(),
            'carrierCode' => $this->getCarrierCode(),
            'carrierName' => $this->getCarrierName(),
            'events' => array_map(function (Event $event) {
                return $event->toArray();
            }, $this->getEvents() ?? []),
        ];
    }
}