<?php

namespace ChicoRei\Packages\Mandae\Webhook;

use ChicoRei\Packages\Mandae\Response\TrackingGetResponse;

class Tracking extends TrackingGetResponse
{
    /**
     * Tracking constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }
}
