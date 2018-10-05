<?php

namespace ChicoRei\Packages\Mandae;

interface IRequest
{
    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getPath();

    /**
     * @return array
     */
    public function getPayload();
}