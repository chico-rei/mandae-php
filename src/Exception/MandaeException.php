<?php

namespace ChicoRei\Packages\Mandae\Exception;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class MandaeException extends \Exception
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Response
     */
    private $response;

    public function __construct(string $message = "", int $code = 0, Request $request, Response $response)
    {
        parent::__construct($message, $code);

        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
}