<?php

namespace ChicoRei\Packages\Mandae\Webhook;

use ChicoRei\Packages\Mandae\MandaeObject;
use ChicoRei\Packages\Mandae\Model\Dimensions;

class ItemProcessed extends MandaeObject
{
    /**
     * Id
     *
     * @var null|string
     */
    public ?string $id;

    /**
     * Partner Item Id
     *
     * @var null|string
     */
    public ?string $partnerItemId;

    /**
     * Tracking Code
     *
     * @var null|string
     */
    public ?string $trackingCode;

    /**
     * Tracking URL
     *
     * @var null|string
     */
    public ?string $trackingUrl;

    /**
     * Price
     *
     * @var null|float
     */
    public ?float $price;

    /**
     * Dimensions
     *
     * @var null|Dimensions
     */
    public ?Dimensions $dimensions;

    /**
     * Reference
     *
     * @var null|string
     */
    public ?string $reference;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return ItemProcessed
     */
    public function setId(?string $id): ItemProcessed
    {
        $this->id = $id;
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
     * @return ItemProcessed
     */
    public function setPartnerItemId(?string $partnerItemId): ItemProcessed
    {
        $this->partnerItemId = $partnerItemId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrackingCode(): ?string
    {
        return $this->trackingCode;
    }

    /**
     * @param string|null $trackingCode
     * @return ItemProcessed
     */
    public function setTrackingCode(?string $trackingCode): ItemProcessed
    {
        $this->trackingCode = $trackingCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    /**
     * @param string|null $trackingUrl
     * @return ItemProcessed
     */
    public function setTrackingUrl(?string $trackingUrl): ItemProcessed
    {
        $this->trackingUrl = $trackingUrl;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return ItemProcessed
     */
    public function setPrice(?float $price): ItemProcessed
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return Dimensions|null
     */
    public function getDimensions(): ?Dimensions
    {
        return $this->dimensions;
    }

    /**
     * @param Dimensions|null $dimensions
     * @return ItemProcessed
     */
    public function setDimensions(?Dimensions $dimensions): ItemProcessed
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     * @return ItemProcessed
     */
    public function setReference(?string $reference): ItemProcessed
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'partnerItemId' => $this->getPartnerItemId(),
            'trackingCode' => $this->getTrackingCode(),
            'trackingUrl' => $this->getTrackingUrl(),
            'price' => $this->getPrice(),
            'dimensions' => $this->getDimensions() ? $this->getDimensions()->toArray() : null,
            'reference' => $this->getReference(),
        ];
    }
}
