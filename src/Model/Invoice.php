<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Invoice extends MandaeObject
{
    /**
     * Id
     *
     * @var string
     */
    public $id;

    /**
     * Key
     *
     * @var string
     */
    public $key;

    /**
     * Type
     *
     * @var string
     */
    public $type;

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Invoice
     */
    public function setId(string $id): Invoice
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return Invoice
     */
    public function setKey(string $key): Invoice
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Invoice
     */
    public function setType(string $type): Invoice
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'key' => $this->getKey(),
            'type' => $this->getType(),
        ];
    }
}
