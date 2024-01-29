<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class NewItem extends MandaeObject
{
    /**
     * Recipient
     *
     * @var Recipient
     */
    public $recipient;

    /**
     * Sender
     *
     * @var Sender
     */
    public $sender;

    /**
     * Shipping Service
     *
     * @var null|string
     */
    public $shippingService;

    /**
     * Partner NewItem Id
     *
     * @var null|string
     */
    public $partnerItemId;

    /**
     * SKUs
     *
     * @var Sku[]
     */
    public $skus;

    /**
     * Invoice
     *
     * @var Invoice
     */
    public $invoice;

    /**
     * Carrier Invoice
     *
     * @var null|CarrierInvoice
     */
    public $carrierInvoice;

    /**
     * Tracking Id
     *
     * @var string
     */
    public $trackingId;

    /**
     * Dimensions
     *
     * @var null|Dimensions
     */
    public $dimensions;

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
     * Volume
     *
     * @var Volume[]
     */
    public $volumes;

    /**
     * Value Added Services
     *
     * @var ValueAddedService[]
     */
    public $valueAddedServices;

    /**
     * Observation
     *
     * @var null|string
     */
    public $observation;

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
     * @return Recipient
     */
    public function getRecipient(): ?Recipient
    {
        return $this->recipient;
    }

    /**
     * @param Recipient|array $recipient
     * @return NewItem
     */
    public function setRecipient($recipient): NewItem
    {
        $this->recipient = Recipient::create($recipient);
        return $this;
    }

    /**
     * @return Sender
     */
    public function getSender(): ?Sender
    {
        return $this->sender;
    }

    /**
     * @param Sender|array $sender
     * @return NewItem
     */
    public function setSender($sender): NewItem
    {
        $this->sender = Sender::create($sender);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingService(): ?string
    {
        return $this->shippingService;
    }

    /**
     * @param string|null $shippingService
     * @return NewItem
     */
    public function setShippingService(?string $shippingService): NewItem
    {
        $this->shippingService = $shippingService;
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
     * @return NewItem
     */
    public function setPartnerItemId(?string $partnerItemId): NewItem
    {
        $this->partnerItemId = $partnerItemId;
        return $this;
    }

    /**
     * @return array
     */
    public function getSkus(): ?array
    {
        return $this->skus;
    }

    /**
     * @param array $skus
     * @return NewItem
     */
    public function setSkus(array $skus): NewItem
    {
        $this->skus = array_map(function ($sku) {
            return Sku::create($sku);
        }, $skus);

        return $this;
    }

    /**
     * @param Sku|array $sku
     * @return NewItem
     */
    public function addSku($sku): NewItem
    {
        if (! is_array($this->skus)) {
            $this->skus = [];
        }

        $this->skus[] = Sku::create($sku);

        return $this;
    }

    /**
     * @return Invoice
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice|array $invoice
     * @return NewItem
     */
    public function setInvoice($invoice): NewItem
    {
        $this->invoice = Invoice::create($invoice);
        return $this;
    }

    /**
     * @return CarrierInvoice|null
     */
    public function getCarrierInvoice(): ?CarrierInvoice
    {
        return $this->carrierInvoice;
    }

    /**
     * @param CarrierInvoice|array|null $carrierInvoice
     * @return NewItem
     */
    public function setCarrierInvoice($carrierInvoice): NewItem
    {
        $this->carrierInvoice = CarrierInvoice::create($carrierInvoice);
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingId(): ?string
    {
        return $this->trackingId;
    }

    /**
     * @param string $trackingId
     * @return NewItem
     */
    public function setTrackingId(string $trackingId): NewItem
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
     * @param Dimensions|array|null $dimensions
     * @return NewItem
     */
    public function setDimensions($dimensions): NewItem
    {
        $this->dimensions = Dimensions::create($dimensions);
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
     * @return NewItem
     */
    public function setTotalValue(?float $totalValue): NewItem
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
     * @return NewItem
     */
    public function setTotalFreight(?float $totalFreight): NewItem
    {
        $this->totalFreight = $totalFreight;
        return $this;
    }

    /**
     * @return array
     */
    public function getVolumes(): ?array
    {
        return $this->volumes;
    }

    /**
     * @param array $volumes
     * @return NewItem
     */
    public function setVolumes(array $volumes): NewItem
    {
        $this->volumes = array_map(function ($volume) {
            return Volume::create($volume);
        }, $volumes);

        return $this;
    }

    /**
     * @param Volume|array $volume
     * @return NewItem
     */
    public function addVolume($volume)
    {
        if (! is_array($this->volumes)) {
            $this->volumes = [];
        }

        $this->volumes[] = Volume::create($volume);

        return $this;
    }

    /**
     * @return array|null
     */
    public function getValueAddedServices(): ?array
    {
        return $this->valueAddedServices;
    }

    /**
     * @param array|null $valueAddedServices
     * @return NewItem
     */
    public function setValueAddedServices(?array $valueAddedServices): NewItem
    {
        $this->valueAddedServices = array_map(function ($valueAddedService) {
            return ValueAddedService::create($valueAddedService);
        }, $valueAddedServices);

        return $this;
    }

    /**
     * @param ValueAddedService|array $valueAddedService
     * @return NewItem
     */
    public function addValueAddedService($valueAddedService)
    {
        if (! is_array($this->valueAddedServices)) {
            $this->valueAddedServices = [];
        }

        $this->valueAddedServices[] = ValueAddedService::create($valueAddedService);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getObservation(): ?string
    {
        return $this->observation;
    }

    /**
     * @param string|null $observation
     * @return NewItem
     */
    public function setObservation(?string $observation): NewItem
    {
        $this->observation = $observation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }

    /**
     * @param string|null $channel
     * @return NewItem
     */
    public function setChannel(?string $channel): NewItem
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStore(): ?string
    {
        return $this->store;
    }

    /**
     * @param string|null $store
     * @return NewItem
     */
    public function setStore(?string $store): NewItem
    {
        $this->store = $store;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'recipient' => $this->getRecipient() ? $this->getRecipient()->toArray() : null,
            'sender' => $this->getSender() ? $this->getSender()->toArray() : null,
            'shippingService' => $this->getShippingService(),
            'partnerItemId' => $this->getPartnerItemId(),
            'skus' => array_map(function (Sku $sku) {
                return $sku->toArray();
            }, $this->getSkus() ?? []),
            'invoice' => $this->getInvoice() ? $this->getInvoice()->toArray() : null,
            'carrierInvoice' => $this->getCarrierInvoice() ? $this->getSender()->toArray() : null,
            'trackingId' => $this->getTrackingId(),
            'dimensions' => $this->getDimensions() ? $this->getDimensions()->toArray() : null,
            'totalValue' => $this->getTotalValue(),
            'totalFreight' => $this->getTotalFreight(),
            'volumes' => array_map(function (Volume $volume) {
                return $volume->toArray();
            }, $this->getVolumes() ?? []),
            'valueAddedServices' => $this->getValueAddedServices() ? array_map(function (
                ValueAddedService $valueAddedServices
            ) {
                return $valueAddedServices->toArray();
            }, $this->getValueAddedServices()) : null,
            'observation' => $this->getObservation(),
            'channel' => $this->getChannel(),
            'store' => $this->getStore(),
        ];
    }
}
