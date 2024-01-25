<?php

namespace ChicoRei\Packages\Mandae\Request;

use ChicoRei\Packages\Mandae\IRequest;
use ChicoRei\Packages\Mandae\MandaeObject;
use ChicoRei\Packages\Mandae\Model\Dimensions;
use ChicoRei\Packages\Mandae\Model\Item;

class PostalCodeRatesRequest extends MandaeObject implements IRequest
{
    /**
     * Postal Code
     *
     * @var null|string
     */
    public $postalCode;

    /**
     * Items
     *
     * @var Item[]
     */
    public $items;

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     * @return PostalCodeRatesRequest
     */
    public function setPostalCode(?string $postalCode): PostalCodeRatesRequest
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return PostalCodeRatesRequest
     */
    public function setItems(array $items): PostalCodeRatesRequest
    {
        $this->items = array_map(function ($item) {
            return Item::create($item);
        }, $items);

        return $this;
    }

    /**
     * @param array $item
     * @return PostalCodeRatesRequest
     */
    public function addItem(array $item): PostalCodeRatesRequest
    {
        if (! is_array($this->items)) {
            $this->items = [];
        }

        $this->items[] = Item::create($item);

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'POST';
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return sprintf('v3/postalcodes/%s/rates', $this->getPostalCode());
    }

    /**
     * @return array|null
     */
    public function getPayload(): ?array
    {
        $payload = $this->toArray();
        unset($payload['postalCode']);

        return $payload;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'postalCode' => $this->getPostalCode(),
            'items' => array_map(function (Item $item) {
                return $item->toArray();
            }, $this->getItems()),
        ];
    }
}
