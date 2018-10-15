<?php

namespace ChicoRei\Packages\Mandae\Webhook;

use ChicoRei\Packages\Mandae\MandaeObject;

class OrderCreated extends MandaeObject
{
    /**
     * Job Id
     *
     * @var null|string
     */
    public $jobId;

    /**
     * Order Id
     *
     * @var null|integer
     */
    public $orderId;

    /**
     * Partner Order Id
     *
     * @var null|string
     */
    public $partnerOrderId;

    /**
     * Status
     *
     * @var null|string
     */
    public $status;

    /**
     * OrderCreated constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return OrderCreated
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'jobId' => $array['jobId'] ?? null,
            'orderId' => $array['orderId'] ?? null,
            'partnerOrderId' => $array['partnerOrderId'] ?? null,
            'status' => $array['status'] ?? null,
        ]);
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
     * @return OrderCreated
     */
    public function setJobId(?string $jobId): OrderCreated
    {
        $this->jobId = $jobId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * @param int|null $orderId
     * @return OrderCreated
     */
    public function setOrderId(?int $orderId): OrderCreated
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPartnerOrderId(): ?string
    {
        return $this->partnerOrderId;
    }

    /**
     * @param null|string $partnerOrderId
     * @return OrderCreated
     */
    public function setPartnerOrderId(?string $partnerOrderId): OrderCreated
    {
        $this->partnerOrderId = $partnerOrderId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param null|string $status
     * @return OrderCreated
     */
    public function setStatus(?string $status): OrderCreated
    {
        $this->status = $status;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'jobId' => $this->getJobId(),
            'orderId' => $this->getOrderId(),
            'partnerOrderId' => $this->getPartnerOrderId(),
            'status' => $this->getStatus(),
        ];
    }
}