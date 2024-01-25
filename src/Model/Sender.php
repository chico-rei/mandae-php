<?php

namespace ChicoRei\Packages\Mandae\Model;

class Sender extends Recipient
{
    /**
     * IE
     *
     * @var null|string
     */
    public $ie;

    /**
     * @return string|null
     */
    public function getIe(): ?string
    {
        return $this->ie;
    }

    /**
     * @param string|null $ie
     * @return Sender
     */
    public function setIe(?string $ie): Sender
    {
        $this->ie = $ie;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'ie' => $this->getIe(),
        ]);
    }
}
