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
     * @return string|null
     */
    public function getTrackingCode(): ?string
    {
        return $this->trackingCode;
    }

    /**
     * @param string|null $trackingCode
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
        return sprintf('v3/trackings/%s', $this->getTrackingCode());
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
