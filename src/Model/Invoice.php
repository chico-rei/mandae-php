<?php

namespace ChicoRei\Packages\Mandae\Model;

use ChicoRei\Packages\Mandae\MandaeObject;

class Invoice extends MandaeObject
{
    /**
     * Id
     *
     * @var string|null
     */
    public $id;

    /**
     * Key
     *
     * @var string|null
     */
    public $key;

    /**
     * Type
     *
     * @var string|null
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
     * @param string|null $id
     * @return Invoice
     */
    public function setId(?string $id): Invoice
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
     * @param string|null $key
     * @return Invoice
     */
    public function setKey(?string $key): Invoice
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
     * @param string|null $type
     * @return Invoice
     */
    public function setType(?string $type): Invoice
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
