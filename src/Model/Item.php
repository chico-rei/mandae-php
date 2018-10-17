<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Item extends MandaeObject
{
    /**
     * Shipping Service values
     */
    const SHIPPING_SERVICE_RAPIDO = 'Rapido';
    const SHIPPING_SERVICE_ECONOMICO = 'Economico';

    /**
     * Id
     *
     * @var null|int
     */
    public $id;

    /**
     * Recipient
     *
     * @var null|Recipient
     */
    public $recipient;

    /**
     * Shipping Service
     *
     * @var null|string
     */
    public $shippingService;

    /**
     * Value Added Services
     *
     * @var null|ValueAddedService[]
     */
    public $valueAddedServices;

    /**
     * Observation
     *
     * @var null|string
     */
    public $observation;

    /**
     * QR Codes
     *
     * @var null|string[]
     */
    public $qrCodes;

    /**
     * Partner Item Id
     *
     * @var null|string
     */
    public $partnerItemId;

    /**
     * SKUs
     *
     * @var null|Sku[]
     */
    public $skus;

    /**
     * Invoice
     *
     * @var null|Invoice
     */
    public $invoice;

    /**
     * Tracking Id
     *
     * @var null|string
     */
    public $trackingId;

    /**
     * Dimensions
     *
     * @var null|Dimensions
     */
    public $dimensions;

    /**
     * Channel
     *
     * @var null|string
     */
    public $channel;

    /**
     * Store
     *
     * @var null|string
     */
    public $store;

    /**
     * Total Value
     *
     * @var null|float
     */
    public $totalValue;

    /**
     * Total Freight
     *
     * @var null|float
     */
    public $totalFreight;

    /**
     * NewItem constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return Item
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'id' => $array['id'] ?? null,
            'recipient' => Recipient::createFromArray($array['recipient'] ?? []),
            'shippingService' => $array['shippingService'] ?? null,
            'valueAddedServices' => $array['valueAddedServices'] ? array_map(function ($valueAddedServices) {
                return ValueAddedService::createFromArray($valueAddedServices);
            }, $array['valueAddedServices']) : null,
            'observation' => $array['observation'] ?? null,
            'qrCodes' => $array['qrCodes'] ?? null,
            'partnerItemId' => $array['partnerItemId'] ?? null,
            'skus' => array_map(function ($sku) {
                return Sku::createFromArray($sku);
            }, $array['skus'] ?? []),
            'invoice' => Invoice::createFromArray($array['invoice'] ?? []),
            'trackingId' => $array['trackingId'] ?? null,
            'dimensions' => Dimensions::createFromArray($array['dimensions'] ?? []),
            'channel' => $array['channel'] ?? null,
            'store' => $array['store'] ?? null,
            'totalValue' => $array['totalValue'] ?? null,
            'totalFreight' => $array['totalFreight'] ?? null,
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
     * @return Item
     */
    public function setId(?int $id): Item
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Recipient|null
     */
    public function getRecipient(): ?Recipient
    {
        return $this->recipient;
    }

    /**
     * @param Recipient|null $recipient
     * @return Item
     */
    public function setRecipient(?Recipient $recipient): Item
    {
        $this->recipient = $recipient;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getShippingService(): ?string
    {
        return $this->shippingService;
    }

    /**
     * @param null|string $shippingService
     * @return Item
     */
    public function setShippingService(?string $shippingService): Item
    {
        $this->shippingService = $shippingService;
        return $this;
    }

    /**
     * @return ValueAddedService[]|null
     */
    public function getValueAddedServices(): ?array
    {
        return $this->valueAddedServices;
    }

    /**
     * @param ValueAddedService[]|null $valueAddedServices
     * @return Item
     */
    public function setValueAddedServices(?array $valueAddedServices): Item
    {
        $this->valueAddedServices = $valueAddedServices;
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
     * @return Item
     */
    public function setObservation(?string $observation): Item
    {
        $this->observation = $observation;
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
     * @return Item
     */
    public function setQrCodes(?array $qrCodes): Item
    {
        $this->qrCodes = $qrCodes;
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
     * @return Item
     */
    public function setPartnerItemId(?string $partnerItemId): Item
    {
        $this->partnerItemId = $partnerItemId;
        return $this;
    }

    /**
     * @return Sku[]|null
     */
    public function getSkus(): ?array
    {
        return $this->skus;
    }

    /**
     * @param Sku[]|null $skus
     * @return Item
     */
    public function setSkus(?array $skus): Item
    {
        $this->skus = $skus;
        return $this;
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice|null $invoice
     * @return Item
     */
    public function setInvoice(?Invoice $invoice): Item
    {
        $this->invoice = $invoice;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTrackingId(): ?string
    {
        return $this->trackingId;
    }

    /**
     * @param null|string $trackingId
     * @return Item
     */
    public function setTrackingId(?string $trackingId): Item
    {
        $this->trackingId = $trackingId;
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
     * @return Item
     */
    public function setDimensions(?Dimensions $dimensions): Item
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }

    /**
     * @param null|string $channel
     * @return Item
     */
    public function setChannel(?string $channel): Item
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getStore(): ?string
    {
        return $this->store;
    }

    /**
     * @param null|string $store
     * @return Item
     */
    public function setStore(?string $store): Item
    {
        $this->store = $store;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalValue(): ?float
    {
        return $this->totalValue;
    }

    /**
     * @param float|null $totalValue
     * @return Item
     */
    public function setTotalValue(?float $totalValue): Item
    {
        $this->totalValue = $totalValue;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalFreight(): ?float
    {
        return $this->totalFreight;
    }

    /**
     * @param float|null $totalFreight
     * @return Item
     */
    public function setTotalFreight(?float $totalFreight): Item
    {
        $this->totalFreight = $totalFreight;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'recipient' => $this->getRecipient() ? $this->getRecipient()->toArray() : null,
            'shippingService' => $this->getShippingService(),
            'valueAddedServices' => $this->getValueAddedServices() ? array_map(function (
                ValueAddedService $valueAddedServices
            ) {
                return $valueAddedServices->toArray();
            }, $this->getValueAddedServices()) : null,
            'observation' => $this->getObservation(),
            'qrCodes' => $this->getQrCodes(),
            'partnerItemId' => $this->getPartnerItemId(),
            'skus' => array_map(function (Sku $sku) {
                return $sku->toArray();
            }, $this->getSkus() ?? []),
            'invoice' => $this->getInvoice() ? $this->getInvoice()->toArray() : null,
            'trackingId' => $this->getTrackingId(),
            'dimensions' => $this->getDimensions() ? $this->getDimensions()->toArray() : null,
            'channel' => $this->getChannel(),
            'store' => $this->getStore(),
            'totalValue' => $this->getTotalValue(),
            'totalFreight' => $this->getTotalFreight(),
        ];
    }
}