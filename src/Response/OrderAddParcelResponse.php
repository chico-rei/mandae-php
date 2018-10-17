<?php

namespace ChicoRei\Packages\Mandae\Response;

use Carbon\Carbon;
use ChicoRei\Packages\Mandae\Model\Order;

class OrderAddParcelResponse extends Order
{
    /**
     * Customer Id
     *
     * @var null|string
     */
    public $jobId;

    /**
     * Pickup Date
     *
     * @var null|Carbon
     */
    public $pickupDate;

    /**
     * Processing Date
     *
     * @var null|Carbon
     */
    public $processingDate;

    /**
     * OrderAddParcelResponse constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return static
     */
    public static function createFromArray(array $array = [])
    {
        /** @var OrderAddParcelResponse $self */
        $self = parent::createFromArray($array);
        $self->setJobId($array['jobId'] ?? null);
        $self->setPickupDate(isset($array['pickupDate']) ? Carbon::parse($array['pickupDate']) : null);
        $self->setProcessingDate(isset($array['processingDate']) ? Carbon::parse($array['processingDate']) : null);

        return $self;
    }

    /**
     * @return null|string
     */
    public function getJobId(): ?string
    {
        return $this->jobId;
    }

    /**
     * @param null|string $jobId
     * @return OrderAddParcelResponse
     */
    public function setJobId(?string $jobId): OrderAddParcelResponse
    {
        $this->jobId = $jobId;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getPickupDate(): ?Carbon
    {
        return $this->pickupDate;
    }

    /**
     * @param Carbon|null $pickupDate
     * @return OrderAddParcelResponse
     */
    public function setPickupDate(?Carbon $pickupDate): OrderAddParcelResponse
    {
        $this->pickupDate = $pickupDate;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getProcessingDate(): ?Carbon
    {
        return $this->processingDate;
    }

    /**
     * @param Carbon|null $processingDate
     * @return OrderAddParcelResponse
     */
    public function setProcessingDate(?Carbon $processingDate): OrderAddParcelResponse
    {
        $this->processingDate = $processingDate;
        return $this;
    }

    /**
     * Check if Add Parcel response was async
     *
     * @return bool
     */
    public function isAsync(): bool
    {
        return !is_null($this->jobId);
    }

    public function toArray(): array
    {
        return array_merge([
            'jobId' => $this->getJobId(),
            'pickupDate' => $this->getPickupDate() ? (string)$this->getPickupDate() : null,
            'processingDate' => $this->getProcessingDate() ? (string)$this->getProcessingDate() : null,
        ], parent::toArray());
    }
}