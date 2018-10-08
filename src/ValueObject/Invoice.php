<?php

namespace ChicoRei\Packages\Mandae\ValueObject;

use ChicoRei\Packages\Mandae\MandaeObject;

class Invoice extends MandaeObject
{
    /**
     * Id
     *
     * @var null|string
     */
    public $id;

    /**
     * Key
     *
     * @var null|string
     */
    public $key;

    /**
     * Invoice constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    /**
     * @param $array
     * @return Invoice
     */
    public static function createFromArray(array $array = [])
    {
        return new self([
            'id' => $array['id'] ?? null,
            'key' => $array['key'] ?? null,
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
     * @return Invoice
     */
    public function setId(?string $id): Invoice
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param null|string $key
     * @return Invoice
     */
    public function setKey(?string $key): Invoice
    {
        $this->key = $key;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'key' => $this->getKey(),
        ];
    }
}