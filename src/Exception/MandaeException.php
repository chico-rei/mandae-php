<?php

namespace ChicoRei\Packages\Mandae\Exception;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class MandaeException extends \Exception
{
    /**
     * @var null|Request
     */
    private $request;

    /**
     * @var null|Response
     */
    private $response;

    /**
     * MandaeException constructor.
     * @param string $message
     * @param int $code
     * @param Request|null $request
     * @param Response|null $response
     */
    public function __construct(string $message = "", int $code = 0, ?Request $request = null, ?Response $response = null)
    {
        parent::__construct($message, $code);

        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return null|Request
     */
    public function getRequest(): ?Request
    {
        return $this->request;
    }

    /**
     * @return null|Response
     */
    public function getResponse(): ?Response
    {
        return $this->response;
    }
}