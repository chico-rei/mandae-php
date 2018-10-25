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
    public $id;

    /**
     * Partner Item Id
     *
     * @var null|string
     */
    public $partnerItemId;

    /**
     * Tracking Code
     *
     * @var null|string
     */
    public $trackingCode;

    /**
     * Tracking URL
     *
     * @var null|string
     */
    public $trackingUrl;

    /**
     * Price
     *
     * @var null|float
     */
    public $price;

    /**
     * Dimensions
     *
     * @var null|Dimensions
     */
    public $dimensions;

    /**
     * Reference
     *
     * @var null|string
     */
    public $reference;

    /**
     * QR Codes
     *
     * @var null|string[]
     */
    public $qrCodes;

    /**
     * ItemProcessed constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return ItemProcessed
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'id' => $array['id'] ?? null,
            'partnerItemId' => $array['partnerItemId'] ?? null,
            'trackingCode' => $array['trackingCode'] ?? null,
            'trackingUrl' => $array['trackingUrl'] ?? null,
            'price' => $array['price'] ?? null,
            'dimensions' => Dimensions::createFromArray($array['dimensions'] ?? []),
            'reference' => $array['reference'] ?? null,
            'qrCodes' => $array['qrCodes'] ?? null,
        ]);
    }

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     * @return ItemProcessed
     */
    public function setId(?string $id): ItemProcessed
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPartnerItemId(): ?string
    {
        return $this->partnerItemId;
    }

    /**
     * @param null|string $partnerItemId
     * @return ItemProcessed
     */
    public function setPartnerItemId(?string $partnerItemId): ItemProcessed
    {
        $this->partnerItemId = $partnerItemId;
        return $this;
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
     * @return ItemProcessed
     */
    public function setTrackingCode(?string $trackingCode): ItemProcessed
    {
        $this->trackingCode = $trackingCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    /**
     * @param null|string $trackingUrl
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
     * @return null|string
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param null|string $reference
     * @return ItemProcessed
     */
    public function setReference(?string $reference): ItemProcessed
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getQrCodes(): ?array
    {
        return $this->qrCodes;
    }

    /**
     * @param null|string[] $qrCodes
     * @return ItemProcessed
     */
    public function setQrCodes(?array $qrCodes): ItemProcessed
    {
        $this->qrCodes = $qrCodes;
        return $this;
    }

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
            'qrCodes' => $this->getQrCodes(),
        ];
    }
}
