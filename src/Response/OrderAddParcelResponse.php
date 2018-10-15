<?php

namespace ChicoRei\Packages\Mandae\Response;

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
     * Check if Add Parcel response was async
     *
     * @return bool
     */
    public function isAsync(): bool
    {
        return !is_null($this->jobId);
    }
}