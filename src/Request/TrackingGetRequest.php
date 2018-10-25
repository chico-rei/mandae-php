<?php

namespace ChicoRei\Packages\Mandae\Request;

use ChicoRei\Packages\Mandae\IRequest;
use ChicoRei\Packages\Mandae\MandaeObject;

class TrackingGetRequest extends MandaeObject implements IRequest
{
    /**
     * Tracking Code
     *
     * @var null|string
     */
    public $trackingCode;

    /**
     * TrackingGetRequest constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return TrackingGetRequest
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'trackingCode' => $array['trackingCode'] ?? null,
        ]);
    }

    /**
     * @return null|string
     */
    public function getTrackingCode(): ?string
    {
        return $this->trackingCode;
    }

    /**
     * @param null|string $trackingCode
     * @return TrackingGetRequest
     */
    public function setTrackingCode(?string $trackingCode): TrackingGetRequest
    {
        $this->trackingCode = $trackingCode;
        return $this;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return sprintf('trackings/%s', $this->trackingCode);
    }

    public function getPayload(): ?array
    {
        return null;
    }

    public function toArray(): array
    {
        return [
            'trackingCode' => $this->getTrackingCode(),
        ];
    }
}
